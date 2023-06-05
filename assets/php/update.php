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

if (isset($_POST['upload'])) {
    $nomeUpdate = $_POST['nomeUpdate'];
    $emailUpdate = $_POST['emailUpdate'];
    $senhaUpdate = $_POST['senhaUpdate'];
    $idadeUpdate = $_POST['idadeUpdate'];
    $generoUpdate = $_POST['generoUpdate'];

    $update = mysqli_query($conexao, "UPDATE cadastro SET nome = '$nomeUpdate', email = '$emailUpdate', senha = '$senhaUpdate', idade = '$idadeUpdate', genero = '$generoUpdate' WHERE codigo = '$id'");

    if ($update) {
        echo "<script>alert('Dados atualizados com sucesso!')</script>";
    } else {
        echo "<script>alert('Erro ao atualizar os dados')</script>";
    }
}
