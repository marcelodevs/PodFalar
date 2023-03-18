<?php

include("conexao.php");

if (isset($_POST['email']) or isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo "
        <script>
            alert('Preencha seu email');
        </script>
        ";
    } else if (strlen($_POST['senha']) == 0) {
        echo "
        <script>
            alert('Preencha sua senha');
        </script>
        ";
    } else if (isset($_POST['submit']) and !empty($_POST['email']) and !empty($_POST['senha'])) {

        $emailLogin = $conexao -> real_escape_string($_POST['nome']);
        $senhaLogin = $conexao -> real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM cadastro WHERE email = '$emailLogin' AND senha = '$senhaLogin'";
        $sql_query = $conexao -> query($sql_code) or die("Falha na execução do comando SQL" . $conexao -> error);

        $qtd = $sql_query -> num_rows;

        if ($qtd == 1) {

            $usuario = $sql_query -> fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['codigo'] = $usuario['codigo'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['senha'] = $usuario['senha'];

            header("Location: index.html");

        } else {
            echo "
            <script>
                alert('Falha ao logar! E-mail ou senha incorretos');
            </script>
            ";
            unset($_SESSION['codigo']);
            unset($_SESSION['nome']);
            unset($_SESSION['senha']);
        }

    }
}
