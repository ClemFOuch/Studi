<?php

use App\Auth;
use App\HTML\Form;
use App\Connection;
use App\Model\Post;
use App\ObjectHelper;
use App\Table\PostTable;
use App\Table\CategoryTable;
use App\Validators\PostValidator;

Auth::check();

$cssLink = '../../css/style.css';
$imgLink = '../../img/sheet.png';

$title = "Création d'article";
$errors = [];
$post = new Post();
$pdo = Connection::getPDO();
$categoryTable = new CategoryTable($pdo);
$categories = $categoryTable->list();
$post->setCreatedAt(date('Y-m-d H:i:s'));

if(!empty($_POST)) {
    $postTable = new PostTable($pdo);
    $v = new PostValidator($_POST, $postTable, $categories, $post->getID());
    ObjectHelper::hydrate($post, $_POST, ['name', 'content', 'slug', 'created_at', 'price']);
    
    if ($v->validate()){
        $pdo->beginTransaction();
        $postTable->createPost($post);
        $postTable->attachCategories($post->getID(), $_POST['categories_ids']);
        $pdo->commit();
        header('Location: '.$router->url('admin_posts'));
    } else {
        $errors = $v->errors();
    }
}
$form = new FORM($post, $errors);
?>

<section class="section-form-admin">
<?php if (!empty($errors)): ?>
    <div class="alerte-message-fail">
        l'article n'a pas été enregistré. Corrigez vos erreurs !
    </div>
<?php endif ?>
<h1 class="form-title-admin">Créer un article</h1>
<?php require('_form.php') ?>
<a href="<?= $router->url('admin_posts') ?>" class="form-btn-back">Retour</a>
</section>