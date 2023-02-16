<?php
use App\URL;
use App\Connection;
use App\Model\{Category, Post};
use App\PaginatedQuery;
use App\Table\CategoryTable;
use App\Table\PostTable;

$cssLink = '../../css/style.css';
$imgLink = '../../img/sheet.png';

$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Connection::getPDO();
$category = (new CategoryTable($pdo))->find($id);

if($category->getSlug() !== $slug){
    $url = $router->url('category', ['slug' => $category ->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location : ' . $url);
}
$title = $category->getName();

[$posts, $paginatedQuery] = (new PostTable($pdo))->findPaginatedForCategory($category->getID());

$link = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);
?>
<section class="sec">
    <h1 class="category-title-show">Categories <?= htmlentities($title) ?></h1>
    <div class="catalogue-container">
        <?php foreach($posts as $post): ?>
        <div class="card-container">
            <?php require dirname(__DIR__).'/catalogues/card.php'?>
        </div>
        <?php endforeach ?>
    </div>
    <div class="btn-pages">
        <?= $paginatedQuery->previousLink($link)?>
        <?= $paginatedQuery->nextLink($link)?>
    </div>
</section>