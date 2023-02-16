<?php

use App\HTML\Form;
use App\Connection;
use App\ObjectHelper;
use App\Table\CategoryTable;
use App\Validators\CategoryValidator;
use App\Auth;

$cssLink = '../../css/style.css';
$imgLink = '../../img/sheet.png';

Auth::check();

$title = "Edition Article";
$pdo = Connection::getPDO();
$table = new CategoryTable($pdo);
$item = $table->find($params['id']);

$success = false;
$errors = [];

if(!empty($_POST)) {
    $v = new CategoryValidator($_POST, $table, $item->getID());
    ObjectHelper::hydrate($item, $_POST, ['name', 'slug']);
    
    if ($v->validate()){
        $table->update([
            'name' => $item->getName(),
            'slug' => $item->getSlug()
        ], $item->getID());
        $success = true;
    } else {
        $errors = $v->errors();
    }
}
$form = new FORM($item, $errors);
?>

<section class="section-form-admin">
<?php if ($success): ?>
    <div class="alerte-message-success">
        La catégorie à bien été modifié
    </div>
<?php endif ?>
<?php if (!empty($errors)): ?>
    <div class="alerte-message-fail">
        La catégorie n'a pas été modifié. Corrigez vos erreurs !
    </div>
<?php endif ?>
<h1 class="form-title-admin">Editer la catégorie <?= htmlentities($item->getName()) ?></h1>
<?php require('_form.php') ?>
<a href="<?= $router->url('admin_categories') ?>" class="form-btn-back">Retour</a>
</section>