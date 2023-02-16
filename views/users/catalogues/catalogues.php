<?php

use App\Connection;
use App\Table\PostTable;
$cssLink = '../../css/style.css';
$imgLink = '../../img/sheet.png';

$title = 'Notre catalogue';
$pdo = Connection::getPDO();

$table = new PostTable($pdo);
[$posts, $pagination] = $table->findPaginated();

$link = $router->url('users_catalogues');
?>
<section class="sec">
    <h2 class="catalogue-title">Notre Catalogue</h2>
    <div class="catalogue-container">
        <?php foreach($posts as $post): ?>
        <div class="card-container">
            <?php require 'card.php'?>
        </div>
        <?php endforeach ?>
    </div>
    <div class="btn-pages">
        <?= $pagination->previousLink($link)?>
        <?= $pagination->nextLink($link)?>
    </div>
</section>