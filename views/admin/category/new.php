<?php

use App\Auth;
use App\HTML\Form;
use App\Connection;
use App\Model\Category;
use App\ObjectHelper;
use App\Table\CategoryTable;
use App\Validators\CategoryValidator;

$cssLink = '../../css/style.css';
$imgLink = '../../img/sheet.png';

Auth::check();

$title = "Création d'article";
$errors = [];
$item = new Category();

if(!empty($_POST)) {
    $pdo = Connection::getPDO();
    $table = new CategoryTable($pdo);
    $v = new CategoryValidator($_POST, $table);
    ObjectHelper::hydrate($item, $_POST, ['name', 'slug']);
    
    if ($v->validate()){
        $table->create([
            'name' => $item->getName(),
            'slug' => $item->getSlug()
        ], $item->getID());
        header('Location: '.$router->url('admin_categories'));
        exit();
    } else {
        $errors = $v->errors();
    }
}
$form = new FORM($item, $errors);
?>

<section class="section-form-admin">
<?php if (!empty($errors)): ?>
    <div class="alerte-message-fail">
        La catégorie n'a pas été enregistré. Corrigez vos erreurs !
    </div>
<?php endif ?>
<h1 class="form-title-admin">Créer une catégorie</h1>
<?php require('_form.php') ?>
<a href="<?= $router->url('admin_categories') ?>" class="form-btn-back">Retour</a>
</section>