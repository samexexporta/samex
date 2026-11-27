const btn = document.querySelector('.menu-btn');
const nav = document.querySelector('.nav');
btn?.addEventListener('click', () => {
  const open = nav.classList.toggle('open');
  btn.setAttribute('aria-expanded', open);
});

// Aviso de cookies: a escolha fica em nx-consent, que o nx.js (analytics) lê.
const cookieBar = document.querySelector('.cookie-bar');
function consentDecided() {
  try {
    const v = JSON.parse(localStorage.getItem('nx-consent') || 'null');
    return !!v && (typeof v.analytics === 'boolean' || typeof v.ads === 'boolean');
  } catch (e) { return false; }
}
function saveConsent(ok) {
  const c = { analytics: ok, ads: false };
  if (window.nx?.consent) window.nx.consent(c);
  else {
    try { localStorage.setItem('nx-consent', JSON.stringify(c)); } catch (e) {}
    window.dispatchEvent(new Event('nx:consent'));
  }
  cookieBar.hidden = true;
}
if (cookieBar) {
  if (!consentDecided()) cookieBar.hidden = false;
  cookieBar.querySelectorAll('[data-consent]').forEach(b =>
    b.addEventListener('click', () => saveConsent(b.dataset.consent === '1')));
  document.querySelector('.cookie-prefs')?.addEventListener('click', e => {
    e.preventDefault();
    cookieBar.hidden = false;
  });
}
