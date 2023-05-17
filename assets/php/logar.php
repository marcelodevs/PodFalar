<?php
session_start();

include_once("conexao.php");

// verifica se o formulário foi enviado pelo método POST e se o campo "emailLogin" foi preenchido
if (isset($_POST['emailLogin'])) {
    $emailLogin = filter_input(INPUT_POST, "emailLogin");
    $senhaLogin = filter_input(INPUT_POST, "senhaLogin");

    // faz uma consulta ao banco onde o campo email e senha do banco forem iguais aos digitados pelo usuário
    $query = "SELECT * FROM cadastro WHERE email='$emailLogin' AND senha='$senhaLogin'";
    $result = mysqli_query($conexao, $query);

    if (mysqli_num_rows($result) == 1) {
        $dadosUser = mysqli_fetch_assoc($result);

        // crio uma variável global de sessão (usada no delete.phh),
        // e pego a coluna código armazenado anteriormente no $dadosUser
        $_SESSION['login_user'] = $dadosUser['codigo'];

        header("Location: ../../index.php");
    } else {
        echo "
            <script>
                alert('ERROR');
            </script>
        ";
    }
}
