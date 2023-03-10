<?php

use App\Auth;
use App\HTML\Form;
use App\Connection;
use App\ObjectHelper;
use App\Table\PostTable;
use App\Table\CategoryTable;
use App\Validators\PostValidator;

Auth::check();

$cssLink = '../../css/style.css';
$imgLink = '../../img/sheet.png';

$title = "Edition Article";
$pdo = Connection::getPDO();
$postTable = new PostTable($pdo);
$categoryTable = new CategoryTable($pdo);
$categories = $categoryTable->list();
$post = $postTable->find($params['id']);
$categoryTable->hydratePosts([$post]);
$success = false;

$errors = [];

if(!empty($_POST)) {
    $v = new PostValidator($_POST, $postTable, $categories, $post->getID());
    ObjectHelper::hydrate($post, $_POST, ['name', 'content', 'slug', 'created_at', 'price']);
    
    if ($v->validate()){
        $pdo->beginTransaction();
        $postTable->updatePost($post);
        $postTable->attachCategories($post->getID(), $_POST['categories_ids']);
        $pdo->commit();
        $categoryTable->hydratePosts([$post]);
        $success = true;
    } else {
        $errors = $v->errors();
    }
}
$form = new FORM($post, $errors);
?>

<section class="section-form-admin">
<?php if ($success): ?>
    <div class="alerte-message-success">
        l'article à bien été modifié
    </div>
<?php endif ?>
<?php if (!empty($errors)): ?>
    <div class="alerte-message-fail">
        l'article n'a pas été modifié. Corrigez vos erreurs !
    </div>
<?php endif ?>
<h1 class="form-title-admin">Editer l'article <?= htmlentities($post->getName()) ?></h1>
<?php require('_form.php') ?>
<a href="<?= $router->url('admin_posts') ?>" class="form-btn-back">Retour</a>
</section>