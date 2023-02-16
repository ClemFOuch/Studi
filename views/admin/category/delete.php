<?php

use App\Auth;
use App\Connection;
use App\Table\CategoryTable;

Auth::check();

$cssLink = '../../../css/style.css';
$imgLink = '../../../img/sheet.png';

$pdo = Connection::getPDO();
$table = new CategoryTable($pdo);
$table->delete($params['id']);
header('Location: ' . $router->url('admin_categories') . '?delete=1');



?>
