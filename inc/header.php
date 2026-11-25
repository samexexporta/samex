<?php
require_once __DIR__ . '/config.php';
$page  = $page ?? 'home';
$other = $lang === 'pt' ? 'es' : 'pt';
$nav   = [
    'home'     => ['index.php', 'nav_home'],
    'products' => ['produtos.php', 'nav_products'],
    'how'      => ['como-funciona.php', 'nav_how'],
    'about'    => ['sobre.php', 'nav_about'],
];
?><!doctype html>
<html lang="<?= $lang ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e(($title ?? 'Samex') . ' · Samex') ?></title>
<meta name="description" content="<?= e(t('hero_text')) ?>">
<link rel="icon" href="images/logo.png">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="site-header">
  <div class="wrap bar">
    <a class="brand" href="index.php"><img src="images/logo.png" alt="Samex"></a>
    <button class="menu-btn" aria-label="Menu" aria-expanded="false">☰</button>
    <nav class="nav">
      <?php foreach ($nav as $key => [$href, $label]): ?>
        <a href="<?= $href ?>"<?= $page === $key ? ' class="active"' : '' ?>><?= e(t($label)) ?></a>
      <?php endforeach; ?>
      <a class="btn btn-sm" href="contato.php"><?= e(t('nav_quote')) ?></a>
      <a class="lang" href="?lang=<?= $other ?>"><?= strtoupper($other) ?></a>
    </nav>
  </div>
</header>
<main>
