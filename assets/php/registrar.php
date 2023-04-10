<?php

session_start();

include_once("conexao.php"); // Inclue a conexão

$nome = filter_input(INPUT_POST, "nome");
$email = filter_input(INPUT_POST, "email");
$senha = filter_input(INPUT_POST, "senha");
$idade = filter_input(INPUT_POST, "idade");
$genero = filter_input(INPUT_POST, "genero");

$sql = mysqli_query(
    $conexao,
    "INSERT INTO cadastro(nome, email, senha, idade, genero)
    VALUES ('$nome', '$email', '$senha', '$idade', '$genero')"
);
if ($sql) {
    echo "
    <script>
        alert('Registro: Bem Vindo!');
    </script>
    ";
    echo "
    <script>
        alert('Agora realize o login para entrar no site :)');
        setInterval(()=>{window.location.href= '../../registar.html'}, 2000);
    </script>
    ";
} else {
    echo "
    <script>
        alert('Registro: ERROR');
    </script>
    ";
    header("Location: ../../registar.html");
}
