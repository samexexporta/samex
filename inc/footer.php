</main>
<footer class="site-footer">
  <div class="wrap foot">
    <div><img src="images/logo.png" alt="Samex"></div>
    <div>
      <strong>Samex</strong> · <?= e(t('foot_tag')) ?><br>
      <a href="mailto:<?= SAMEX_EMAIL ?>"><?= SAMEX_EMAIL ?></a>
    </div>
    <div class="small">© <?= date('Y') ?> Samex. <?= e(t('foot_rights')) ?><br>
      <a href="creditos.php"><?= e(t('credits')) ?></a> · <a href="#" class="cookie-prefs"><?= e(t('ck_prefs')) ?></a></div>
  </div>
</footer>
<div class="cookie-bar" role="dialog" aria-live="polite" aria-label="Cookies" hidden>
  <div class="wrap cookie-in">
    <p><?= e(t('ck_text')) ?></p>
    <div class="cookie-actions">
      <button type="button" class="btn btn-sm btn-ghost" data-consent="0"><?= e(t('ck_reject')) ?></button>
      <button type="button" class="btn btn-sm" data-consent="1"><?= e(t('ck_accept')) ?></button>
    </div>
  </div>
</div>
<script src="js/main.js?v=<?= filemtime(__DIR__ . '/../js/main.js') ?>"></script>
</body>
</html>
