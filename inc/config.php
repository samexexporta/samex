<?php
// ===== Ajuste estes dados antes de publicar no domínio do cliente =====
const SAMEX_EMAIL    = 'contato@samex.com.br'; // aparece no rodapé e recebe as cotações
const SAMEX_WHATSAPP = '';                      // DDI + DDD + número, só dígitos. Vazio = o link do WhatsApp fica escondido
const SAMEX_LANGS    = ['pt', 'es'];

// ===== Modo demonstração (clientes.nevaex.com/samex) =====
// true  = mostra a etiqueta "Demonstração" e envia as cotações de teste para a Nevaex, não para o cliente.
// false = site oficial, no domínio do cliente (as cotações vão para SAMEX_EMAIL).
const SAMEX_DEMO       = true;
const SAMEX_EMAIL_DEMO = 'ola@nevaex.com';

// Nome próprio para a sessão: vários sites PHP dividem o mesmo subdomínio
// e, sem isso, o idioma escolhido num site vazaria para o outro.
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
