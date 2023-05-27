<?php

session_start();
include_once("../php/conexao.php");

$id_user = $_SESSION['login_user'];
if (!$id_user) {
    echo
    "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <script>
        swal({
            title: 'ERROR',
            text: 'Parece que você não fez o login!',
            icon: 'warning',
            buttons: ['Cancelar', 'Ok'],
        })
            .then((confirm) => {
            if (confirm) location.href = '../../registar.php'; 
            else location.href = '../../index.php'; 
        });
        document.querySelector('body').classList.add('none');
    </script>";
}

$query = "SELECT * FROM cadastro WHERE codigo = $id_user";
$result = mysqli_query($conexao, $query);

if (mysqli_num_rows($result) == 1) {
    $dadosUser = mysqli_fetch_assoc($result);
} else {
    $dadosUser = '';
}

$dadosUser['genero'] = strtolower($dadosUser['genero']);
if ($dadosUser['genero'] == 'feminino') {
    echo "<script>document.querySelector('.right-msg .msg-bubble').style.background = 'pink'</script>";
} else {
    echo "<script>document.querySelector('.right-msg .msg-bubble').style.background = 'dodgerblue'</script>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="chat.css">
    <title>ChatBot - PodFalar</title>
</head>

<body>

    <!-- HTML para o overlay -->
    <div id="loading-overlay">
        <img src="../img/carregador.png" alt="Loading" class="loading-image">
    </div>

    <a href="../../index.php">
        <img src="../img/botao-voltar.png" class="img-btn-back">
    </a>

    <div class="chat-input-pergunta">
        <input type="text" class="msg-pergunta">
        <!-- <button disabled>kasdj</button> -->
        <button class="enviar">➡️</button>
    </div>

    <section class="msger">
        <header class="msger-header">
            <div class="msger-header-title">
                <i class="fas fa-comment-alt">PodFalar - HelpChat</i>
            </div>
            <div class="msger-header-options">
                <span><i class="fas fa-cog"></i></span>
                <div class="light">
                    <div class="switch-cont">
                        <input type="checkbox" id="switch" class="switch">
                        <label for="switch" class="slider">
                            <i class="fas fas-moon"></i>
                            <i class="fas fas-sun"></i>
                        </label>
                    </div>
                </div>
            </div>
        </header>

        <main class="msger-chat"></main>

        <div class="btn-group">
            <button class="interromper pause">Parar</button>
            <button class="interromper end">Terminar</button>
        </div>

        <div class="dropdown">
            <button class="dropdown-btn">Perguntas frequentes</button>
            <div class="dropdown-content">
                <aside>
                    <table id="suggestion">
                        <tbody>
                            <tr>
                                <td>Como deixar meu depoimento?</td>
                            </tr>
                            <tr>
                                <td>O que é educação sexual?</td>
                            </tr>
                            <tr>
                                <td>Por que a educação sexual é importante?</td>
                            </tr>
                            <tr>
                                <td>Quais são os principais tópicos abordados na educação sexual?</td>
                            </tr>
                            <tr>
                                <td>Quando devo começar a falar sobre educação sexual com meu filho?</td>
                            </tr>
                            <tr>
                                <td>Como abordar a educação sexual de forma adequada com crianças?</td>
                            </tr>
                            <tr>
                                <td>O que é consentimento sexual?</td>
                            </tr>
                            <tr>
                                <td>Como prevenir doenças sexualmente transmissíveis?</td>
                            </tr>
                            <tr>
                                <td>O que é contracepção e quais são os métodos disponíveis?</td>
                            </tr>
                            <tr>
                                <td>O que são relações saudáveis e como desenvolvê-las?</td>
                            </tr>
                            <tr>
                                <td>Como lidar com o bullying e a pressão social relacionados à sexualidade?</td>
                            </tr>
                            <tr>
                                <td>Como identificar e lidar com abuso sexual?</td>
                            </tr>
                            <tr>
                                <td>O que é identidade de gênero?</td>
                            </tr>
                            <tr>
                                <td>O que é orientação sexual?</td>
                            </tr>
                            <tr>
                                <td>Como apoiar amigos ou familiares LGBTQI+?</td>
                            </tr>
                            <tr>
                                <td>O que é pornografia e como abordar esse assunto com os jovens?</td>
                            </tr>
                            <tr>
                                <td>Como promover a igualdade de gênero na educação sexual?</td>
                            </tr>
                            <tr>
                                <td>Quais são os direitos sexuais e reprodutivos?</td>
                            </tr>
                        </tbody>
                    </table>
                </aside>
            </div>
        </div>
    </section>

    <script src="chat.js"></script>
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
</body>

</html>
