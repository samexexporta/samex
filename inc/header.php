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
<?php if (SAMEX_DEMO): // etiqueta da demonstração: some sozinha quando SAMEX_DEMO = false em inc/config.php ?>
<a class="demo-pill" href="../">← Nevaex · Demonstração</a>
<style>.demo-pill{position:fixed;left:12px;bottom:12px;z-index:60;padding:.45rem .9rem;font:600 .8rem/1.2 system-ui,sans-serif;color:#e8edf5;background:#0b1220;border:1px solid #3de0b4;border-radius:999px;text-decoration:none;box-shadow:0 4px 14px rgba(0,0,0,.3)}.demo-pill:hover{background:#121c31}</style>
<?php endif; ?>
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
