<?php
use App\HTML\Form;
use App\Connection;
use App\Model\Contact;
use App\Table\ContactTable;
use App\ObjectHelper;

$cssLink = '../../css/style.css';
$imgLink = '../../img/sheet.png';
$title = "Contactez nous !";
$nav = "contact";
$formTitle = ucfirst($nav);

$contact = new Contact();
$errors=[];
if(!empty($_POST)) {
    ObjectHelper::hydrate($contact, $_POST, ['username', 'usersurname', 'usersociety','object', 'message']);
    if(!empty($_POST['username']) && !empty($_POST['usersurname']) && !empty($_POST['usersociety']))
    {
            $table = new ContactTable(Connection::getPDO());
            $table->create([
                'username' => $contact->getUserName(),
                'usersurname' => $contact->getUserSurname(),
                'usersociety' => $contact->getUsersociety(),
                'object' => $contact->getObject(),
                'message' => $contact->getMessage()
            ], $contact->getID());
            header('Location: ' . $router->url('Ventalis'));
            exit();
    }
}
$form = new FORM($contact, $errors);
?>
<section class="section-form-contact">
    <form action="" method="POST" class="form">
    <div class="form-container-column">
            <h2 class="form-title"><?= $formTitle ?></h2>

            <?= $form->inputConnect('username', "Votre prénom"); ?>
            <?= $form->inputConnect('usersurname', "Votre nom"); ?>
            <?= $form->inputConnect('usersociety', "Votre entreprise"); ?>
            <?= $form->inputConnect('object', "Votre objet"); ?>
            <?= $form->textareaContact('message', "Entrez votre message"); ?>
        </div>
        <div class="form-container-column">
            <div class="form-items">
                <button type="submit" class="form-btn">Envoyer</button>
            </div>
        </div>
    </form>
</section>