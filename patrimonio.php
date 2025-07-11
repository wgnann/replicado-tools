<?php
require_once __DIR__ . '/vendor/autoload.php';
use Uspdev\Replicado\Pessoa;
use Uspdev\Replicado\Bempatrimoniado;
use Dotenv\Dotenv;

$dotenv = Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

# obtém a unidade via replicado
$codund = getenv('REPLICADO_CODUNDCLG');

$numpat = $argv[1];
$bem = Bempatrimoniado::dump($numpat);
$codpes = $bem['codpes'];
$pessoa = Pessoa::dump($codpes);
$nompes = $pessoa['nompes'];
$email = Pessoa::email($codpes);
echo $nompes.",".$email."\n";
