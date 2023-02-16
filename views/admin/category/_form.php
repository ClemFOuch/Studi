<form action="" method="POST" class="form-admin">
    <?= $form->input('name', 'Titre'); ?>
    <?= $form->input('slug', 'URL'); ?>
    <button class="form-btn">
        <?php if($item->getID()!== null ): ?>
        Modifier
        <?php else: ?>
        Créer
        <?php endif ?>    
    </button>
</form>