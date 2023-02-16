<?php
$cssLink = '../../css/style.css';
$imgLink = '../../../img/sheet.png';
use App\Connection;
use App\Table\PostTable;
use App\Table\CategoryTable;

$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Connection::getPDO();
$post = (new PostTable($pdo))->find($id);
(new CategoryTable($pdo))->hydratePosts([$post]);

if($post->getSlug() !== $slug){
    $url = $router->url('post', ['slug' => $post ->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location : ' . $url);
}

?>
<section class="sec">
    <a href="<?= $router->url('catalogues') ?>" class="form-btn-back">Retour</a>
    <div class="show-card">
        <div class="show-card-title">
            <h5 class="show-title-product"><?= htmlentities($post->getName()) ?></h5>
        </div>
        <div class="show-card-date">
            <p class="show-date-post"><?= $post->getCreatedAt()->format('d/m/Y') ?></p>
        </div>
        <div class="show-category">
            <?php foreach($post->getCategories() as $category):
                $category_url = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);
            ?>
                <a class="show-category-link"href="<?=$category_url?>"><?= htmlentities($category->getName())?></a>
            <?php endforeach ?>
        </div>
        <div class="show-card-body">
            <p class="show-card-detail"><?= $post->getFormattedContent() ?></p>
        </div>
        <div class="show-card-title">
            <h4 class="show-title-product"><?= htmlentities($post->getPrice()) ?>€</h4>
        </div>
        <div class="show-btn">
            <button type="submit" class="cart-btn">Ajouter au Panier</button>
        </div>
    </div>
</section>