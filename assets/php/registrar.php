<?php

    // print_r($_REQUEST);

if (isset($_POST['submit'])) {

    include_once("conexao.php"); // Inclue a conexão

    $nome = filter_input(INPUT_POST, "nome");
    $email = filter_input(INPUT_POST, "email");
    $senha = filter_input(INPUT_POST, "senha");
    $idade = filter_input(INPUT_POST, "idade");
    $genero = filter_input(INPUT_POST, "genero");

    // Verfica se qual o gênero foi escolhido
    if ($genero == "rgb(67, 67, 164)") {
        // Muda a variável de acordo com o valor dos inputs
        $genero = "Masculino";
    } else if ($genero == "pink") {
        $genero = "Feminino";
    } else if ($genero == "linear-gradient(to right, pink, red, orange, yellow, green, blue, violet)") {
        $genero = "LGBTIQIA+";
    } else if ($genero == "gray") {
        $genero = "Prefiro não dizer";
    }

    $sql = mysqli_query(
        $conexao,
        "INSERT INTO cadastro(nome, email, senha, idade, genero)
    VALUES ('$nome', '$email', '$senha', '$idade', '$genero')"
    );
} else {
    header("Location: registrar.php");
}
