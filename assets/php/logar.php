<?php
session_start();

include_once("conexao.php");

if (isset($_POST['emailLogin'])); {
    $emailLogin = filter_input(INPUT_POST, "emailLogin");
    $senhaLogin = filter_input(INPUT_POST, "senhaLogin");

    $query = "SELECT * FROM cadastro WHERE email='$emailLogin' AND senha='$senhaLogin'";
    $result = mysqli_query($conexao, $query);
    if (mysqli_num_rows($result) == 1) {
        $dadosUser = mysqli_fetch_assoc($result);

        $_SESSION['login_user'] = $dadosUser['codigo'];

        echo "
            <script>
                alert('Bem vindo de volta!');
            </script>
            ";
        echo "
            <script>
                setInterval(()=>{window.location.href= '../../index.php'}, 1000)
            </script>
            ";
    } else {
        echo "
            <script>
            alert('Login: ERROR');
            </script>
        ";
    }
}
?>
