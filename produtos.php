<?php
$page = 'products';
$title = 'Produtos';
require __DIR__ . '/inc/header.php';
$cats = require __DIR__ . '/inc/categories.php';
$products = require __DIR__ . '/inc/products.php';
?>
<section class="page-head"><div class="wrap">
  <h1><?= e(t('prod_title')) ?></h1>
  <p class="lead"><?= e(t('prod_intro')) ?></p>
</div></section>
<section class="section"><div class="wrap">
  <div class="grid4">
    <?php foreach ($cats as $slug => [$emoji, $key, $photo]): ?>
      <div class="card cat-full">
        <img class="photo" src="images/produtos/<?= $photo ?>.jpg" alt="<?= e(t($key)) ?>" loading="lazy">
        <div class="body">
          <h3><?= $emoji ?> <?= e(t($key)) ?></h3>
          <p><?= e(t($key . '_d')) ?></p>
          <a class="link" href="contato.php?cat=<?= $slug ?>"><?= e(t('prod_ask')) ?> →</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <p class="center muted" style="margin-top:2rem"><?= e(t('prod_other')) ?></p>
</div></section>

<section class="section alt"><div class="wrap">
  <h2><?= e(t('prod_feat')) ?></h2>
  <div class="gallery">
    <?php foreach ($products as $photo => $names): ?>
      <figure>
        <img src="images/produtos/<?= $photo ?>.jpg" alt="<?= e($names[$lang === 'es' ? 1 : 0]) ?>" loading="lazy">
        <figcaption><?= e($names[$lang === 'es' ? 1 : 0]) ?></figcaption>
      </figure>
    <?php endforeach; ?>
  </div>
</div></section>
<?php require __DIR__ . '/inc/footer.php'; ?>
