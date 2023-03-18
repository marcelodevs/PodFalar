<?php

$server = 'localhost';
$user = 'root';
$password = '';
$bd = 'podfalar';

$conexao = new mysqli($server, $user, $password, $bd);

if ($conexao) {
    echo "
        <script>
            alert('Conexão: Bem vindo!') 
        </script>
        ";
} else {
    echo "
    <script>
        alert('Conexão: ERROR')
    </script>
    ";
}
