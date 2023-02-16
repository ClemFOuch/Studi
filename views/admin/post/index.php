<?php

use App\Auth;
use App\Connection;
use App\Table\PostTable;

Auth::check();

$router->layout= "admin/layouts/default";
$title = "Administration";
$pdo = Connection::getPDO();
$link = $router->url('admin_posts');
[$posts, $pagination] = (new PostTable($pdo))->findPaginated();
?>

<section class="sec">
<?php if(isset($_GET['delete'])): ?>
<div class="alerte-message-success">
    L'article' a bien été supprimé
</div>
<?php endif ?>
<?php if(isset($_GET['created'])): ?>
<div class="alerte-message-success">
    L'article' a bien été créé
</div>
<?php endif ?>
    <table>
        <thead>
            <th class="table-title">#</th>
            <th class="table-title">Titre</th>
            <th class="table-title">Price</th>
            <th class="table-title">
                <a href="<?= $router->url('admin_post_new') ?>" class="admin-news-article">Nouveau</a>
            </th>
        </thead>
        <tbody>
            <?php foreach($posts as $post): ?>
                <tr>
                    <td class="table-content">#<?= $post->getID()?></td>
                    <td class="table-content">
                        <a href="<?= $router->url('admin_post', ['id' => $post->getID()]) ?>">
                        <?= htmlentities($post->getName())?></a>
                    </td>
                    <td class="table-content"><?= htmlentities($post->getPrice())?>€</td>
                    <td class="table-content-btn">
                        <a href="<?= $router->url('admin_post', ['id' => $post->getID()]) ?>">
                        Editer</a>
                        <form action="<?= $router->url('admin_post_delete', ['id' => $post->getID()]) ?>"
                        onsubmit="return confirm('Voulez vous vraiement effectuer cette action?')" method="POST" class="btn-supp">
                        <button type="submit" class="btn-form-supp">Supprimer</button></form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="btn-pages">
        <?= $pagination->previousLink($link)?>
        <?= $pagination->nextLink($link)?>
    </div>
</section>