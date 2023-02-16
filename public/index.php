<?php

require '../vendor/autoload.php';

define('DEBUG_TIME', microtime(true));

$whoops = new Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

if(isset($_GET['page']) && $_GET['page'] === '1'){
    $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
    $get = $_GET;
    unset($get['page']);
    $query = http_build_query($get);
    if (!empty($query)) {
        $uri = $uri . '?' . $query;
    }
    http_response_code(301);
    header('Location: ' . $uri);
    exit();
}

$router = new App\Router(dirname(__DIR__) . '/views');
$router
    ->get('/','home/index','Ventalis')
    ->match('/inscription','inscriptions/inscription','Inscription')
    ->match('/connexion','connexion/connexion','Connexion')
    ->post('/deconnexion','connexion/deconnexion','deconnexion')
    ->get('/apropos', 'about/aboutus', 'A propos')
    ->match('/contact','contact/contact','contact')
    ->get('/catalogues/category/[*:slug]-[i:id]','category/show','category')
    ->get('/catalogues/[*:slug]-[i:id]', 'catalogues/show','post')
    ->get('/catalogues','catalogues/catalogues','catalogues')
    //Utilisateur
    ->get('/users','users/index','users_home')
    ->get('/users/apropos', 'users/about/aboutus', 'users_apropos')
    ->match('/users/contact','users/contact/contact','users_contact')
    ->get('/users/catalogues/category/[*:slug]-[i:id]','category/show','users_category')
    ->get('/users/catalogues/[*:slug]-[i:id]', 'catalogues/show','users_post')
    ->get('/users/catalogues','users/catalogues/catalogues','users_catalogues')
    // Employe / Admin
    // GEstion des articles
    ->get('/admin', 'admin/post/index', 'admin_posts')
    ->match('/admin/post/[i:id]', 'admin/post/edit', 'admin_post')
    ->post('/admin/post/[i:id]/delete', 'admin/post/delete', 'admin_post_delete')
    ->match('/admin/post/new', 'admin/post/new', 'admin_post_new')
    // Gestion des catégories
    ->get('/admin/categories', 'admin/category/index', 'admin_categories')
    ->match('/admin/category/[i:id]', 'admin/category/edit', 'admin_category')
    ->post('/admin/category/[i:id]/delete', 'admin/category/delete', 'admin_category_delete')
    ->match('/admin/category/new', 'admin/category/new', 'admin_category_new')
    ->run();