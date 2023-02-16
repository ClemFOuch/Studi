<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlentities($title) ?? 'Ventalis'?></title>
    <link rel="stylesheet" href="<?= $cssLink ?? '../../css/style.css' ?>"/>
  </head>
  <body>
    <header id="header">
      <div class="logo-box">
        <img src="<?= $imgLink ?? '../../img/sheet.png'?>" alt="logo ventalis feuilles en v" class="logo-brand">
        <a href="/" class="logo">Ventalis</a>
      </div>
      <ul class="navigation">
        <li><a href="/admin">Articles</a></li>
        <li><a href="/admin/categories">Catégories</a></li>
        <li><form action="/deconnexion" method="post"><button class="btn-nav" type="submit">Se déconnecter</button></form></li>
      </ul>
    </header>
    <?= $content ?>
    <footer class="footer">
        <p class="footer-text">Ventalis - All rights reserved - 2023 - ECF Studi - Fouchard Clément</p>
        <p class="footer-text">page générée en <?= round(1000 * (microtime(true) - DEBUG_TIME)) ?> ms </p>
    </footer>
    <?=$pageJavascripts ?? '' ?>
    </body>
</html>