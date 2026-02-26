<?php
require_once __DIR__ . '/vendor/autoload.php';
use Uspdev\Replicado\Pessoa;
use Dotenv\Dotenv;

$dotenv = Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

# obtém a unidade via replicado
$codund = getenv('REPLICADO_CODUNDCLG');

if ($argc > 1) { $setor = $argv[1]; }
else { $setor = ""; }
switch ($setor) {
    case 'mac':
        $pessoas = Pessoa::listarDocentes(1664);
        break;
    case 'mae':
        $pessoas = Pessoa::listarDocentes(1665);
        break;
    case 'map':
        $pessoas = Pessoa::listarDocentes(1666);
        break;
    case 'mat':
        $pessoas = Pessoa::listarDocentes(1667);
        break;
    default:
        $pessoas = Pessoa::servidores();
        break;
}

foreach ($pessoas as $pessoa) {
    $emails = Pessoa::emails($pessoa['codpes']);
    $ime = $usp = "";
    foreach ($emails as $email) {
        if (str_contains($email, "ime.usp.br")) {
            $ime = $email;
        }
        else if (str_contains($email, "usp.br")) {
            $usp = $email;
        }
    }

    # ime > usp > outros
    if ($ime) { $email = $ime; }
    else if ($usp) { $email = $usp; }
    else { $email = $pessoa['codema']; }

    echo $pessoa['nompes'].",".$email."\n";
}
