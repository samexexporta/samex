<?php
$page = 'about';
$title = 'Sobre';
require __DIR__ . '/inc/header.php';
?>
<section class="page-head"><div class="wrap"><h1><?= e(t('about_title')) ?></h1></div></section>
<section class="section"><div class="wrap narrow">
  <p class="lead"><?= e(t('about_p1')) ?></p>
  <p class="lead"><?= e(t('about_p2')) ?></p>
  <p><a class="btn" href="contato.php"><?= e(t('nav_quote')) ?></a></p>
</div></section>
<?php require __DIR__ . '/inc/footer.php'; ?>
