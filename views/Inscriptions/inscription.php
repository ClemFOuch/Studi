<?php

use App\HTML\Form;
use App\Connection;
use App\Model\User;
use App\Table\UserTable;
use App\Validators\UserValidator;
use App\ObjectHelper;
use App\Table\Exception\NotFoundException;


$title = "Inscrivez-vous";
$nav = "inscription";
$formTitle = ucfirst($nav);
$btn_title = 'Envoyer';

$user = new User();
$errors=[];

if(!empty($_POST)) {
    ObjectHelper::hydrate($user, $_POST, ['username', 'usersurname', 'login', 'usersociety','password']);
    if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['passwordbis']) && !empty($_POST['username']) && !empty($_POST['usersurname']) && !empty($_POST['usersociety']))
    {
        if($_POST['password']===$_POST['passwordbis']){
            $table = new UserTable(Connection::getPDO());
            $v = new UserValidator($_POST, $table);
            if ($v->validate()){
                $table->create([
                    'username' => $user->getUserName(),
                    'usersurname' => $user->getUserSurname(),
                    'login' => $user->getLogin(),
                    'password' => password_hash($user->getPassword(),PASSWORD_BCRYPT),
                    'usersociety' => $user->getUsersociety(),
                    'role' => 'utilisateur'
                ], $user->getID());
                header('Location: ' . $router->url('Ventalis'));
                exit();
            } else {
                $errors = $v->errors();
            }
        } else {
            $errors = ['Vos mots de passe ne correspondent pas'];
        }
    }
}
$form = new FORM($user, $errors);
?>
<section class="section-form">
    <form action="" method="POST" class="form">
        <div class="form-container-column">
            <h2 class="form-title"><?= $formTitle ?></h2>
            <?php if (!empty($errors)): ?>
                <div class="alerte-message-fail">
                    Vos mots de passe sont éronés. Corrigez vos erreurs !
                </div>
            <?php endif ?>
            <?= $form->inputConnect('username', "Votre prénom"); ?>
            <?= $form->inputConnect('usersurname', "Votre nom"); ?>
            <?= $form->inputConnect('login', "Votre adresse mail"); ?>
            <?= $form->inputConnect('password', "Mot de passe"); ?>
            <?= $form->inputConnect('passwordbis', "Vérifiez votre mot de passe"); ?>
            <?= $form->inputConnect('usersociety', "Votre entreprise"); ?>
        </div>
        <div class="form-container-column">
            <div class="form-items">
                <button type="submit" class="form-btn"><?= $btn_title ?></button>
            </div>
        </div>
    </form>
</section>