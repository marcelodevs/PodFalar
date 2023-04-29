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

$queryDel = "DELETE FROM cadastro WHERE codigo = '$id'";
$resultDel = mysqli_query($conexao, $queryDel);

echo "
    <script>
        alert('Exclusão realizada com sucesso!');
        window.location.href = '../../index.php';
    </script>
";
