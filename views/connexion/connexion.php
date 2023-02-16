<?php

use App\HTML\Form;
use App\Connection;
use App\Model\User;
use App\Table\Exception\NotFoundException;
use App\Table\UserTable;

$title = "Connectez-vous";
$nav = "connexion";
$formTitle = ucfirst($nav);
$btn_title = 'Se connecter';

$user = new User();
$errors = [];

if(!empty($_POST)) {
    $user->setLogin($_POST['login']);
    $errors['password'] = "Identifiant ou mot de passe incorrect";
    if(!empty($_POST['login']) && !empty($_POST['password']))
    {
        $table = new UserTable(Connection::getPDO());
        try {
            $u = $table->findByLogin($_POST['login']);
            if(password_verify($_POST['password'],$u->getPassword()) === true ){
                session_start();
                $_SESSION['auth'] = $u->getRole();
                if($_SESSION['auth'] === 'employe'){
                    header('Location: ' . $router->url('admin_posts'));
                    exit();
                } else if($_SESSION['auth'] === 'utilisateur') {
                    header('Location: ' . $router->url('users_home'));
                    exit();
                } else {
                    header('Location: ' . $router->url('Ventalis'));
                }
            }
        } catch (NotFoundException $e){
        }
    }
}

$form = new Form($user,$errors);
?>
<section class="section-form">
    <form action="" method="POST" class="form">
        <div class="form-container-column">
            <h2 class="form-title"><?= $formTitle ?></h2>
            <?= $form->inputConnect('login', "Nom d'utilisateur"); ?>
            <?= $form->inputConnect('password', "Mot de passe"); ?>
        </div>
        <div class="form-container-column">
            <div class="form-items">
                <button type="submit" class="form-btn"><?= $btn_title ?></button>
            </div>
        </div>
    </form>
</section>