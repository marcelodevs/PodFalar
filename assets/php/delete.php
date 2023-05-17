<?php

// inicio a sessão e pego a conexão com o include_once
session_start();
include_once('conexao.php');

// armazeno a sessão 'login_user' criado no registro
$id_user = $_SESSION['login_user'];

/*Seleciono todos as colunas da tabela cadastro,
onde o codigo (chave primaria) for igual ao do usuário registrado (atarvés da sessão criada)*/
$query = "SELECT * FROM cadastro WHERE codigo = $id_user";
$result = mysqli_query($conexao, $query);

/*Verifico se as colunas retornado da consulta anterior existe 
(verificando se é igual a um, pois só existe um usuário com aquele código)*/
if (mysqli_num_rows($result) == 1) {
    // armazeno os dados e as colunas da consulta na variável $dadosUser
    $dadosUser = mysqli_fetch_assoc($result);
    // pego somente o código dessa consulta
    $id = $dadosUser['codigo'];
}

// faço a deleção do usuário
$queryDel = "DELETE FROM cadastro WHERE codigo = '$id'";
$resultDel = mysqli_query($conexao, $queryDel);

if ($result) {
    //Redireciono o usuário para a página principal
    header("Location: ../../index.php");
    include("logout.php");
}
