<?php
require_once __DIR__ . '/vendor/autoload.php';
use Uspdev\Replicado\Pessoa;
use Uspdev\Replicado\Posgraduacao;
use Dotenv\Dotenv;

if (!isset($argv[1])) {
    die("uso: ".$argv[0]." [código da área]\n");
}

$dotenv = Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

$codare = $argv[1];
$orientadores = Posgraduacao::orientadores($codare);

foreach ($orientadores as $orientador) {
    $email = Pessoa::email($orientador["codpes"]);
    echo "$email\n";
}
