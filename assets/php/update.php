<?php

session_start();
include_once('conexao.php');

$id_user = $_SESSION['login_user'];

$query = "SELECT * FROM cadastro WHERE codigo = $id_user";
$result = mysqli_query($conexao, $query);

$id = 0;
if (mysqli_num_rows($result) == 1) {
    $dadosUser = mysqli_fetch_assoc($result);
    $id = $dadosUser['codigo'];
}

$data = json_decode(file_get_contents("php://input"), true);

$update = mysqli_query($conexao, "UPDATE cadastro SET nome = '$nomeUpdate', email = '$emailUpdate', senha = '$senhaUpdate', idade = '$idadeUpdate', genero = '$generoUpdate' WHERE codigo = '$id'");
