<?php

// Cria a sessão caso ela não exista
if (!isset($_SESSION)) {
    // O isset() verifica se a variável $_SESSION existe
    session_start();
}

session_destroy(); // Destrói a sessão, ou seja, o usuário não vai tá mais logado

header("Location: ../../index.php"); // Rediriciona o usuário para a página inicial
