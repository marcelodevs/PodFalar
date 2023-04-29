<?php

session_start();
include_once('conexao.php');

$id_user = $_SESSION['login_user'];

$query = "SELECT * FROM cadastro WHERE codigo = $id_user";
$result = mysqli_query($conexao, $query);

if (mysqli_num_rows($result) == 1) {
    $dadosUser = mysqli_fetch_assoc($result);
    $id = $dadosUser['codigo'];
}

$nomeUpdate = filter_input(INPUT_POST, "nomeUpdate");
$emailUpdate = filter_input(INPUT_POST, "emailUpdate");
$senhaUpdate = filter_input(INPUT_POST, "senhaUpdate");
$idadeUpdate = filter_input(INPUT_POST, "idadeUpdate");
$generoUpdate = filter_input(INPUT_POST, "generoUpdate");

$update = mysqli_query($conexao, "UPDATE cadastro SET nome = '$nomeUpdate', email = '$emailUpdate', senha = '$senhaUpdate', idade = '$idadeUpdate', genero = '$generoUpdate' WHERE codigo = '$id'");

echo "
    <script>
        alert('Mudança realizada com sucesso!');
        window.location.href = '../../index.php';
    </script>
";
