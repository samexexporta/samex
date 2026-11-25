<?php
$page = 'how';
$title = 'Como funciona';
require __DIR__ . '/inc/header.php';
?>
<section class="page-head"><div class="wrap">
  <h1><?= e(t('how_title')) ?></h1>
  <p class="lead"><?= e(t('how_intro')) ?></p>
</div></section>
<section class="section"><div class="wrap narrow">
  <ol class="timeline">
    <?php foreach ([1, 2, 3, 4, 5] as $i): ?>
      <li><h3><?= e(t("how{$i}_t")) ?></h3><p><?= e(t("how{$i}_d")) ?></p></li>
    <?php endforeach; ?>
  </ol>
  <p class="muted small"><?= e(t('how_note')) ?></p>
  <p><a class="btn" href="contato.php"><?= e(t('nav_quote')) ?></a></p>
</div></section>
<?php require __DIR__ . '/inc/footer.php'; ?>
