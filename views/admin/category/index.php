<?php

use App\Auth;
use App\Connection;
use App\Table\CategoryTable;

Auth::check();

$router->layout= "admin/layouts/default";
$title = "Administration";
$pdo = Connection::getPDO();
$link = $router->url('admin_categories');
$items = (new CategoryTable($pdo))->all();
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
            <th class="table-title">URL</th>
            <th class="table-title">
                <a href="<?= $router->url('admin_category_new') ?>" class="admin-news-article">Nouveau</a>
            </th>
        </thead>
        <tbody>
            <?php foreach($items as $item): ?>
                <tr>
                    <td class="table-content">#<?= $item->getID()?></td>
                    <td class="table-content">
                        <a href="<?= $router->url('admin_category', ['id' => $item->getID()]) ?>">
                        <?= htmlentities($item->getName())?></a>
                    </td>
                    <td class="table-content"><?= htmlentities($item->getSlug())?></td>
                    <td class="table-content-btn">
                        <a href="<?= $router->url('admin_category', ['id' => $item->getID()]) ?>">
                        Editer</a>
                        <form action="<?= $router->url('admin_category_delete', ['id' => $item->getID()]) ?>"
                        onsubmit="return confirm('Voulez vous vraiement effectuer cette action?')" method="POST" class="btn-supp">
                        <button type="submit" class="btn-form-supp">Supprimer</button></form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>