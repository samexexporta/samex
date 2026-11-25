<?php
$page = 'quote';
$title = 'Cotação';
require_once __DIR__ . '/inc/config.php';
$cats = require __DIR__ . '/inc/categories.php';

$status = null;
$v = ['name' => '', 'company' => '', 'email' => '', 'phone' => '', 'country' => '', 'qty' => '', 'msg' => ''];
$selected = isset($_GET['cat']) ? [(string)$_GET['cat']] : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($v as $k => $_) {
        $v[$k] = trim((string)($_POST[$k] ?? ''));
    }
    $selected = array_values(array_intersect((array)($_POST['cats'] ?? []), array_keys($cats)));

    if (!empty($_POST['website'])) { // honeypot
        $status = 'ok';
    } elseif ($v['name'] === '' || $v['country'] === '' || !filter_var($v['email'], FILTER_VALIDATE_EMAIL)) {
        $status = 'err';
    } else {
        $catNames = array_map(fn($s) => $T[$cats[$s][1]]['pt'], $selected);
        $body = "Nome: {$v['name']}\nEmpresa: {$v['company']}\nE-mail: {$v['email']}\nTelefone: {$v['phone']}\n"
              . "País: {$v['country']}\nCategorias: " . implode(', ', $catNames) . "\nVolume: {$v['qty']}\n\n{$v['msg']}\n";

        $record = ['date' => date('c'), 'lang' => $lang] + $v + ['cats' => $selected];
        file_put_contents(__DIR__ . '/data/cotacoes.jsonl', json_encode($record, JSON_UNESCAPED_UNICODE) . "\n", FILE_APPEND | LOCK_EX);

        $name = str_replace(["\r", "\n"], ' ', $v['name']);
        $replyTo = $v['email'];
        // Na demonstração, o e-mail de teste vai para a Nevaex e não para o cliente
        $destino = SAMEX_DEMO ? SAMEX_EMAIL_DEMO : SAMEX_EMAIL;
        $prefixo = SAMEX_DEMO ? '[DEMO Samex] ' : '';
        @mail($destino, '=?UTF-8?B?' . base64_encode("{$prefixo}Nova cotação - $name") . '?=', $body,
            "From: " . SAMEX_EMAIL . "\r\nReply-To: $replyTo\r\nContent-Type: text/plain; charset=UTF-8");
        $status = 'ok';
        $v = array_fill_keys(array_keys($v), '');
        $selected = [];
    }
}

require __DIR__ . '/inc/header.php';
$countries = ['c_uy', 'c_ar', 'c_py', 'c_cl', 'c_other'];
?>
<section class="page-head"><div class="wrap">
  <h1><?= e(t('quote_title')) ?></h1>
  <p class="lead"><?= e(t('quote_intro')) ?></p>
</div></section>
<section class="section"><div class="wrap narrow">
  <?php if ($status === 'ok'): ?><div class="alert ok"><?= e(t('f_ok')) ?></div><?php endif; ?>
  <?php if ($status === 'err'): ?><div class="alert err"><?= e(t('f_err')) ?></div><?php endif; ?>

  <form method="post" class="form">
    <input type="text" name="website" class="hp" tabindex="-1" autocomplete="off" aria-hidden="true">
    <div class="row">
      <label><?= e(t('f_name')) ?>*<input name="name" value="<?= e($v['name']) ?>" required></label>
      <label><?= e(t('f_company')) ?><input name="company" value="<?= e($v['company']) ?>"></label>
    </div>
    <div class="row">
      <label><?= e(t('f_email')) ?>*<input type="email" name="email" value="<?= e($v['email']) ?>" required></label>
      <label><?= e(t('f_phone')) ?><input name="phone" value="<?= e($v['phone']) ?>"></label>
    </div>
    <label><?= e(t('f_country')) ?>*
      <select name="country" required>
        <option value=""><?= e(t('f_select')) ?></option>
        <?php foreach ($countries as $c): $n = t($c); ?>
          <option value="<?= e($n) ?>"<?= $v['country'] === $n ? ' selected' : '' ?>><?= e($n) ?></option>
        <?php endforeach; ?>
      </select>
    </label>
    <fieldset>
      <legend><?= e(t('f_cats')) ?></legend>
      <div class="checks">
        <?php foreach ($cats as $slug => [$emoji, $key]): ?>
          <label class="check"><input type="checkbox" name="cats[]" value="<?= $slug ?>"<?= in_array($slug, $selected, true) ? ' checked' : '' ?>> <?= $emoji ?> <?= e(t($key)) ?></label>
        <?php endforeach; ?>
      </div>
    </fieldset>
    <label><?= e(t('f_qty')) ?><input name="qty" value="<?= e($v['qty']) ?>"></label>
    <label><?= e(t('f_msg')) ?><textarea name="msg" rows="5"><?= e($v['msg']) ?></textarea></label>
    <button class="btn" type="submit"><?= e(t('f_send')) ?></button>
  </form>

  <?php if (SAMEX_WHATSAPP !== ''): ?>
  <p class="muted"><?= e(t('or_whatsapp')) ?>:
    <a href="https://wa.me/<?= e(SAMEX_WHATSAPP) ?>" target="_blank" rel="noopener">WhatsApp</a></p>
  <?php endif; ?>
</div></section>
<?php require __DIR__ . '/inc/footer.php'; ?>
