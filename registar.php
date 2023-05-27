<?php

session_start();

include_once("assets/php/conexao.php"); // Inclue a conexão

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        isset($_POST["nome"]) &&
        isset($_POST["email"]) &&
        isset($_POST["senha"]) &&
        isset($_POST["idade"]) &&
        isset($_POST["genero"])
    ) {
        // pego os valores digitados pelo usuário
        $nome = filter_input(INPUT_POST, "nome");
        $email = filter_input(INPUT_POST, "email");
        $senha = filter_input(INPUT_POST, "senha");
        $idade = filter_input(INPUT_POST, "idade");
        $genero = filter_input(INPUT_POST, "genero");

        $pastaImagens = 'assets/img';
        $nomeArquivo = 'user.png';
        $novoNomeArquivo = 1 . '_' . uniqid();
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
        $caminhoArquivo = $pastaImagens . $novoNomeArquivo . '.' . $extensao;

        // Move o arquivo para o local desejado
        move_uploaded_file($_FILES['fotoPerfil']['tmp_name'], $caminhoArquivo);

        try {
            $sql = mysqli_query(
                $conexao,
                "INSERT INTO cadastro(nome, email, senha, idade, genero, file_user)
                VALUES ('$nome', '$email', '$senha', '$idade', '$genero', '$caminhoArquivo')"
            );
        } catch (Exception $th) {
            echo "<script> alert('Erro:" . $th->getMessage() . "')</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/registrar.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <title>Registrar</title>
</head>

<body>
    <a href="index.php">
        <img src="assets/img/botao-voltar.png" class="img-btn-back">
    </a>

    <div class="dialogo">
        <dialog>
            <h1>Sucess</h1>
            <p>Agora para tudo ocorrer bem, faça o login (entrar) corretamente :)</p>
            <button>Ok</button>
        </dialog>
    </div>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="registar.php" method="post">
                <h1>Criar Conta</h1>
                <input type="text" placeholder="Nome" name="nome" />
                <input type="email" placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
                <input type="password" placeholder="Password" name="senha" />
                <input type="number" placeholder="Idade" name="idade" />
                <input type="text" placeholder="Gênero" name="genero" />
                <button class="btn-login">Inscrever-se</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="assets/php/logar.php" method="post">
                <h1>Entrar</h1>
                <input type="email" placeholder="Email" name="emailLogin" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
                <input type="password" placeholder="Password" name="senhaLogin" />
                <a href="#">Esqueceu sua senha?</a>
                <button class="btn-entrar">Entrar</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <button class="ghost" id="signIn" style="background: #fff;">Entrar</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Olá amigo!</h1>
                    <p>Introduza os seus dados pessoais e comece a viajar connosco</p>
                    <button class="ghost" id="signUp">Inscrever-se</button>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/registro.js"></script>
</body>

</html>
