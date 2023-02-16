<?php
use App\Connection;

require dirname(__DIR__) . '/vendor/autoload.php';

$faker = Faker\Factory::create('fr_FR');

$pdo = Connection::getPDO();

// Clean Database
$pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
$pdo->exec('TRUNCATE TABLE post_category');
$pdo->exec('TRUNCATE TABLE post');
$pdo->exec('TRUNCATE TABLE category');
$pdo->exec('TRUNCATE TABLE users');
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1');

$posts = [];
$categories = [];

// Insert data in db
for ($i =0; $i < 50; $i ++) {
    $pdo->exec("INSERT INTO post SET name='{$faker->sentence()}', slug='{$faker->slug}', content='{$faker->paragraphs(rand(3,15),true)}', price = '{$faker->randomNumber(4, false)}', created_at ='{$faker->date} {$faker->time}'");
    $posts[] = $pdo->lastInsertId();
}

for ($i =0; $i < 5; $i ++) {
    $pdo->exec("INSERT INTO category SET name='{$faker->sentence(2)}', slug='{$faker->slug}'");
    $categories[] = $pdo->lastInsertId();
}

foreach($posts as $post){
    $randomCategories = $faker->randomElements($categories, rand(0, count($categories)));
    foreach ($randomCategories as $category) {
        $pdo->exec("INSERT INTO post_category SET post_id=$post, category_id=$category");
    }
}


$password = password_hash('2v*&X9Rv', PASSWORD_BCRYPT);
$passworduser = password_hash('1234abcd', PASSWORD_BCRYPT);
$pdo->exec("INSERT INTO users SET login='admin@ventalis.com', password='$password', username='admin', usersurname='admin', usersociety='ventalis', role='employe'");
$pdo->exec("INSERT INTO users SET login='jean@mail.com', password='$passworduser', username='jean', usersurname='michel', usersociety='jeanmichelcorporate', role='utilisateur'");


