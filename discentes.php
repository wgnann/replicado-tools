<?php
require_once __DIR__ . '/vendor/autoload.php';
use Uspdev\Replicado\Graduacao;
use Uspdev\Replicado\Posgraduacao;
use Dotenv\Dotenv;

$dotenv = Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

# obtém a unidade via replicado
$codund = getenv('REPLICADO_CODUNDCLG');

$alunosgr = Graduacao::listarAtivos();
foreach ($alunosgr as $aluno) {
    echo "grad:".$aluno["nompes"]."\n";
}

$alunospos = Posgraduacao::ativos($codund);
foreach ($alunospos as $aluno) {
    echo "pos:".$aluno["nompes"]."\n";
}
