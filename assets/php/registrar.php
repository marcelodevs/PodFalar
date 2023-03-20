<?php

// print_r($_REQUEST);

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
} else if ($genero == "linear-gradient(to right, #ffc0cb, #ff0000, #ffa500, #ffff00, #008000, #0000ff, #ee82ee)") {
    $genero = "LGBTQIA+";
} else if ($genero == "gray") {
    $genero = "Prefiro não dizer";
}

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
    header("Location: ../../index.html");
} else {
    echo "
    <script>
        alert('Registro: ERROR');
    </script>
    ";
    header("Location: ../../registar.html");
}
