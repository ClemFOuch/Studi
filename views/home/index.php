<?php
$title = 'Bienvenue chez Ventalis';
?>
<section class="main">
      <h2 id="text">
        Ventalis
      </h2>
      <img src="./img/bird1.png" id="bird1">
      <img src="./img/bird2.png" id="bird2">
      <img src="./img/forest.png" id="forest">
      <a href="/inscription" class="inscription" id="btn">Inscription</a>
      <img src="./img/rocks.png" id="rocks">
      <img src="./img/water.png" id="water">
</section>
<?php require dirname(__DIR__) . '/about/aboutus.php'?>

<?php ob_start(); ?>
    <script>
        let text = document.getElementById('text');
        let bird1 = document.getElementById('bird1');
        let bird2 = document.getElementById('bird2');
        let forest = document.getElementById('forest');
        let btn = document.getElementById('btn');
        let rocks = document.getElementById('rocks');
        let water = document.getElementById('water');
        let header = document.getElementById('header');
            
        window.addEventListener('scroll', function(){
        let value = window.scrollY;

        text.style.top = 42 + value * -0.3 + '%';
        bird1.style.top = value * -1.5 + 'px';
        bird1.style.left = value * 2 + 'px';
        bird2.style.top = value * -1.5 + 'px';
        bird2.style.left = value * -5 + 'px';
        btn.style.marginTop = value * 1 + 'px';
        rocks.style.top = value * -0.12 + 'px';
        forest.style.top = value * 0.25 + 'px';
        header.style.top = value * 0.5 + 'px';
        })
    </script>
<?php $pageJavascripts = ob_get_clean(); ?>