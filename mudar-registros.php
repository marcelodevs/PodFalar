<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/mudar-registro.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <title>Mudar Registro</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['login_user'])) {
        include_once('assets/php/conexao.php');

        $id_user = $_SESSION['login_user'];

        $query = "SELECT * FROM cadastro WHERE codigo = $id_user";
        $result = mysqli_query($conexao, $query);

        if (mysqli_num_rows($result) == 1) {
            $dadosUser = mysqli_fetch_assoc($result);
        }

        echo "
                    <div class='container'>
                        <fieldset>
                            <legend>Editar perfil</legend>
                            <form class='myForm'>
                                <input type='text' value = '" . $dadosUser['nome'] . "' name='nomeUpdate'>
                                <input type='text' value='" . $dadosUser['email'] . "' name='emailUpdate'>
                                <input type='password' value='" . $dadosUser['senha'] . "' name='senhaUpdate'>
                                <input type='number' value='" . $dadosUser['idade'] . "' name='idadeUpdate'>
                                <input type='text' value='" . $dadosUser['genero'] . "' name='generoUpdate'>
                                <button type='submit' class='update'>Atualizar</button>
                                <button type='submit' class='del'>Excluir</button>
                            </form>
                        </fieldset>
                    </div>
                ";
    } else {
        echo "
        <script>
            alert('Você não fez o login!');
            window.location.href = 'index.php';
        </script>
        ";
    }
    ?>

    <script>
        var form = document.querySelector(".myForm");

        var btnUpdate = document.querySelector(".update").addEventListener('click', () => {
            form.action = "assets/php/update.php";
        });

        var btnDel = document.querySelector(".del").addEventListener('click', () => {
            form.action = "assets/php/delete.php";
        });
    </script>
</body>

</html>
