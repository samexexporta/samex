<?php
$page = 'home';
require __DIR__ . '/inc/header.php';
$cats = require __DIR__ . '/inc/categories.php';
?>
<section class="hero">
  <div class="wrap hero-grid">
    <div>
      <p class="kicker"><?= e(t('hero_kicker')) ?></p>
      <h1><?= e(t('hero_title')) ?></h1>
      <p class="lead"><?= e(t('hero_text')) ?></p>
      <p class="actions">
        <a class="btn" href="contato.php"><?= e(t('nav_quote')) ?></a>
        <a class="btn btn-ghost" href="produtos.php"><?= e(t('hero_cta2')) ?></a>
      </p>
    </div>
    <div class="hero-art" aria-hidden="true">
      <?php foreach (['banana', 'laranja', 'pitaya', 'tomate', 'uva', 'mamao'] as $p): ?>
        <img src="images/produtos/<?= $p ?>.jpg" alt="">
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <h2><?= e(t('steps_title')) ?></h2>
    <div class="grid3">
      <?php foreach ([1, 2, 3] as $i): ?>
        <div class="card step"><span class="num"><?= $i ?></span>
          <h3><?= e(t("step{$i}_t")) ?></h3><p><?= e(t("step{$i}_d")) ?></p></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section alt">
  <div class="wrap">
    <h2><?= e(t('prod_title')) ?></h2>
    <div class="grid4">
      <?php foreach ($cats as $slug => [$emoji, $key, $photo]): ?>
        <a class="card cat" href="contato.php?cat=<?= $slug ?>">
          <img class="photo" src="images/produtos/<?= $photo ?>.jpg" alt="<?= e(t($key)) ?>" loading="lazy">
          <h3><?= e(t($key)) ?></h3>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <h2><?= e(t('why_title')) ?></h2>
    <div class="grid3">
      <?php foreach ([1, 2, 3] as $i): ?>
        <div class="card"><h3><?= e(t("why{$i}_t")) ?></h3><p><?= e(t("why{$i}_d")) ?></p></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section alt">
  <div class="wrap center">
    <h2><?= e(t('countries_t')) ?></h2>
    <p class="muted"><?= e(t('countries_d')) ?></p>
    <div class="chips">
      <span class="chip on">🇺🇾 <?= e(t('c_uy')) ?> · <?= e(t('c_active')) ?></span>
      <span class="chip">🇦🇷 <?= e(t('c_ar')) ?> · <?= e(t('c_soon')) ?></span>
      <span class="chip">🇵🇾 <?= e(t('c_py')) ?> · <?= e(t('c_soon')) ?></span>
    </div>
  </div>
</section>

<section class="cta">
  <div class="wrap center">
    <h2><?= e(t('cta_title')) ?></h2>
    <p><?= e(t('cta_text')) ?></p>
    <a class="btn btn-light" href="contato.php"><?= e(t('nav_quote')) ?></a>
  </div>
</section>
<?php require __DIR__ . '/inc/footer.php'; ?>
