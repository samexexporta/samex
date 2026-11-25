<?php
// ===== Dados do site (samexexporta.com.br) =====
const SAMEX_EMAIL    = 'samex.exportacao@gmail.com'; // aparece no rodapé e recebe as cotações
const SAMEX_EMAIL_FROM = 'nao-responda@samexexporta.com.br'; // remetente técnico das cotações (o Reply-To é o e-mail do cliente)
const SAMEX_WHATSAPP = '';                      // DDI + DDD + número, só dígitos. Vazio = o link do WhatsApp fica escondido
const SAMEX_LANGS    = ['pt', 'es'];

// Nome próprio para a sessão, para não conflitar com outros sites PHP no mesmo domínio.
session_name('samex_sess');
session_start();

$lang = $_GET['lang'] ?? $_SESSION['lang'] ?? null;
if (!in_array($lang, SAMEX_LANGS, true)) {
    $accept = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '';
    $lang = str_starts_with($accept, 'es') ? 'es' : 'pt';
}
$_SESSION['lang'] = $lang;

$T = require __DIR__ . '/i18n.php';

function t(string $key): string
{
    global $T, $lang;
    return $T[$key][$lang] ?? $key;
}

function e(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
