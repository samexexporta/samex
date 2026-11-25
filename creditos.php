<?php
$page = 'credits';
$title = 'Créditos';
require __DIR__ . '/inc/header.php';
// arquivo => [autor, licença]
$credits = [
    'limao'    => ['André Karwath aka Aka', 'CC BY-SA 2.5', 'Lemon.jpg'],
    'coco'     => ['Ivar Leidus', 'CC BY-SA 4.0', 'Coconuts - single and cracked open.jpg'],
    'pitaya'   => ['Webysther Nunes', 'CC BY-SA 4.0', 'Webysther 20150409032418 - Pitaya.jpg'],
    'aipim'    => ['David Monniaux', 'CC BY-SA 3.0', 'Manihot esculenta dsc07325.jpg'],
    'mamao'    => ['Ivar Leidus', 'CC BY-SA 4.0', 'Papaya - longitudinal section.jpg'],
    'gengibre' => ['Friday musa', 'CC BY-SA 4.0', 'Fresh ginger rhizome 01.jpg'],
    'laranja'  => ['ArildV', 'CC BY-SA 4.0', 'Navelina oranges.jpg'],
    'uva'      => ['fir0002 | flagstaffotos', 'GFDL 1.2', 'Table grapes on white.jpg'],
    'tomate'   => ['Softeis', 'CC BY-SA 3.0', 'Tomato je.jpg'],
    'cebola'   => ['Wikimedia Commons', 'GFDL 1.2', 'Onions.jpg'],
    'alface'   => ['Muna.R', 'CC BY-SA 3.0', 'Lettuce.jpg'],
];
$products = require __DIR__ . '/inc/products.php';
$products['alface'] = ['Alface', 'Lechuga'];
?>
<section class="page-head"><div class="wrap"><h1><?= e(t('credits_title')) ?></h1></div></section>
<section class="section"><div class="wrap narrow">
  <p class="muted"><?= e(t('credits_intro')) ?></p>
  <ul>
    <?php foreach ($credits as $photo => [$author, $license, $file]): ?>
      <li><?= e($products[$photo][$lang === 'es' ? 1 : 0]) ?>: <?= e($author) ?>, <?= e($license) ?> ·
        <a href="https://commons.wikimedia.org/wiki/File:<?= rawurlencode($file) ?>" target="_blank" rel="noopener">Wikimedia Commons</a></li>
    <?php endforeach; ?>
  </ul>
</div></section>
<?php require __DIR__ . '/inc/footer.php'; ?>
