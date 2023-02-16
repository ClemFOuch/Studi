<?php
$categories = array_map(function ($category) use($router) {
    $url = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);
    return <<<HTML
    <a class="card-category-link" href="{$url}">{$category->getName()} </a>
HTML;
}, $post->getCategories());
?>


<div class="catalogue-card">
    <div class="card-title">
        <h5 class="title-product"><?= htmlentities($post->getName()) ?></h5>
    </div>
    <?php if(!empty($post->getCategories())):?>
    <div class="card-categories">
        <?= implode(' / ', $categories)?>
    </div>
    <?php endif ?>
    <div class="card-body">
        <p class="card-detail"><?= $post->getExcerpt() ?></p>
    </div>
    <div class="card-date">
        <p class="date-post"><?= $post->getCreatedAt()->format('d/m/Y') ?></p>
    </div>
    <div class="card-btn">
        <button class="btn-show"><a href="<?= $router->url('post', ['id' => $post->getId(), 'slug' => $post->getSlug()]) ?>">Voir plus</a></button>
    </div>
</div>