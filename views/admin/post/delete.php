<?php

use App\Connection;
use App\Table\PostTable;
use App\Auth;

Auth::check();

$cssLink = '../../../css/style.css';
$imgLink = '../../../img/sheet.png';

$pdo = Connection::getPDO();
$table = new PostTable($pdo);
$table->delete($params['id']);
header('Location: ' . $router->url('admin_posts') . '?delete=1');



?>
<section class="sec">
<h1>Suppression de <?= $params['id'] ?></h1>
</section>