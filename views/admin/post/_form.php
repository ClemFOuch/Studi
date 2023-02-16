<form action="" method="POST" class="form-admin">
    <?= $form->input('name', 'Titre'); ?>
    <?= $form->input('slug', 'URL'); ?>
    <?= $form->input('price', 'Prix'); ?>
    <?= $form->select('categories_ids', 'Catégories', $categories); ?>
    <?= $form->textarea('content','Contenu'); ?>
    <?= $form->input('created_at','Date de création'); ?>
    <button class="form-btn">
        <?php if($post->getID()!== null ): ?>
        Modifier
        <?php else: ?>
        Créer
        <?php endif ?>    
    </button>
</form>