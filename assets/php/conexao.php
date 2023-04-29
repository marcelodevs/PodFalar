<?php

$server = 'localhost';
$user = 'root';
$password = '';
$bd = 'podfalar';

try {
    $conexao = new mysqli($server, $user, $password, $bd);
} catch (Exception $erro) {
    echo 'Erro: ' . $erro->getMessage();
}
