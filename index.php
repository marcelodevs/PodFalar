<?php

session_start();
include_once('assets/php/conexao.php');

if (!isset($_SESSION['login_user'])) { //Verifica se existe a sessão "login_user"
    $id = '';
} else {
    $id = $_SESSION['login_user'];
}

$query = "SELECT * FROM cadastro WHERE codigo = '$id'";
$result = mysqli_query($conexao, $query);

if (mysqli_num_rows($result) == 1) { //Verfica se existe alguma coluna de acordo com a query anterior
    $dadosUser = mysqli_fetch_assoc($result);
} else {
    $dadosUser = '';
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">


    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/animation/keyframe.css">
    <link rel="stylesheet" href="assets/css/media-query.css">
    <title>PodFalar</title>
</head>

<body>

    <!-- BARRA DE PROGRESSO -->
    <div id="progress-bar"></div>

    <!-- HTML para o overlay -->
    <div id="loading-overlay">
        <img src="assets/img/carregador.png" alt="Loading" class="loading-image">
    </div>

    <!-- MENU -->
    <header>
        <nav id="menu">
            <div>
                <a href="index.php" class="logo" translate="no" style="color: black;">
                    <img src="assets/img/podfalar-logo.png" class="podfalar-logo">
                    <span class="logo-txt-lateral">PodFalar</span>
                </a>
            </div>
            <ul class="lista">
                <a href="#" class="link">Home</a>
                <a href="depoimentos.html" class="link">Depoimentos</a>
                <a href="assets/chat/chat.php" class="link">Auto-ajuda</a>
                <a href="assets/documents/PodFalar.pdf" target="_blank" class="link">Listar Dicas</a>
            </ul>
            <div class="menu-responsive">
                <button class="navbar burguer" onclick="toggleMenu()"></button>
                <div class="menu">
                    <nav>
                        <a href="#" style="animation-delay: .2s;">Home</a>
                        <a href="depoimentos.html" style="animation-delay: .3s;">Depoimentos</a>
                        <a href="registar.php" style="animation-delay: .4s;">Registrar</a>
                        <a href="assets/chat/chat.html" style="animation-delay: .5s;">Auto-ajuda</a>
                        <a href="listar-dicas.html" style="animation-delay: .6s;">Listar dicas</a>
                    </nav>
                </div>
            </div>
            <span>
                <!-- DETALHE DO USUÁRIO -->
                <details id="details-user">
                    <summary>
                        <img src='<?php
                                    if (isset($_SESSION['login_user'])) echo $dadosUser['file_user'];
                                    else echo 'assets/img/user.png';
                                    ?>' alt='img' name='fotoPerfil' class="user" onclick="toggleDetails()">
                    </summary>
                    <section class="login">
                        <span>Você não tem conta logada ainda, <a href="registar.php" class="link-login">registre-se ou logue-se</a> agora</span>
                    </section>
                    <div class="container-details">
                        <div class="infor-main">
                            <div class="profile-image">
                                <img src='<?php
                                            if (isset($_SESSION['login_user'])) echo $dadosUser['file_user'];
                                            else echo 'assets/img/user.png';
                                            ?>' alt='img' name='fotoPerfil'>
                            </div>
                            <h1 data-name="nome">
                                <?php
                                if ($dadosUser == '') {
                                    echo '';
                                } else {
                                    echo $dadosUser['nome'];
                                }
                                ?>
                                <a href="mudar-registros.php">⚙️</a>
                            </h1>
                            <div class="overlay">
                                <img src="" alt="Ampliar Imagem">
                            </div>
                        </div>
                        <div class="infor">
                            <div class="information">
                                <img src="assets/img/user.png" alt="nome">
                                <span class="infor-span" data-name="nome">
                                    <?php
                                    if ($dadosUser == '') {
                                        echo '';
                                    } else {
                                        echo $dadosUser['nome'];
                                    }
                                    ?>
                                </span>
                            </div>
                            <hr>
                            <div class="information">
                                <img src="assets/img/e-mail.png" alt="email">
                                <span class="infor-span" data-name="email">
                                    <?php
                                    if ($dadosUser == '') {
                                        echo '';
                                    } else {
                                        echo $dadosUser['email'];
                                    }
                                    ?>
                                </span>
                            </div>
                            <hr>
                            <div class="information">
                                <img src="assets/img/faixa-etaria.png" alt="idade">
                                <span class="infor-span" data-name="idade">
                                    <?php
                                    if ($dadosUser == '') {
                                        echo '';
                                    } else {
                                        echo $dadosUser['idade'];
                                    }
                                    ?>
                                </span>
                            </div>
                            <hr>
                            <div class="information">
                                <img src="assets/img/genero.png" alt="genero">
                                <span class="infor-span" data-name="genero">
                                    <?php
                                    if ($dadosUser == '') {
                                        echo '';
                                    } else {
                                        echo $dadosUser['genero'];
                                        echo "<script>console.log('Passou do genero')</script>";
                                        $dadosUser['genero'] = strtolower($dadosUser['genero']);
                                        echo "<script>console.log('Passou da transformação')</script>";
                                        if ($dadosUser['genero'] == 'feminino') {
                                            echo "
                                            <script>
                                                console.log('Passsou no feminino');
                                                document.querySelector('.infor-main').style.background = 'radial-gradient(circle at center, #ff96a8, #8d3a69)';
                                            </script>";
                                        } else if ($dadosUser['genero'] == 'masculino') {
                                            echo "
                                            <script>
                                                console.log('Passsou no masculino');
                                                document.querySelector('.infor-main').style.background = 'radial-gradient(circle at center, #9d96ff, #423a8d);';
                                            </script>";
                                        }
                                    } ?>
                                </span>
                            </div>
                            <hr>
                            <a href="assets/php/logout.php">
                                <button class="sair">Sair</button>
                            </a>
                        </div>
                    </div>
                    <?php
                    if (!isset($_SESSION['login_user'])) {
                        echo "
                                <script>
                                    document.querySelector('.container-details').style.display = 'none';
                                    document.querySelector('.login').style.display = 'block';
                                </script>";
                    } else {
                        echo "
                                <script>
                                    document.querySelector('.container-details').style.display = 'block';
                                    document.querySelector('.login').style.display = 'none';
                                </script>";
                    }
                    ?>
                </details>
                <div id="background-overlay"></div>
            </span>
        </nav>
    </header>

    <main>
        <!-- IMAGEM DO PRIMEIRO VIWERPOINT -->
        <section id="main-text-img"></section>

        <!-- TABELAS, CHAT E APRESENTAÇÃO -->
        <section id="second-infor">
            <div class="reveal span-ballon-info">
                <p class="podfalar-txt-main">
                    A educação sexual é um tema importante e relevante para todas as pessoas, independentemente
                    de
                    sua
                    idade,
                    gênero ou
                    orientação sexual. A educação sexual aborda muitas questões diferentes relacionadas à
                    sexualidade,
                    incluindo saúde
                    sexual, relações interpessoais, consentimento, gravidez, prevenção de doenças sexualmente
                    transmissíveis
                    e muito mais. Embora a educação sexual seja importante, muitas vezes pode ser um assunto
                    delicado e
                    difícil de abordar. Esse é o propósito do nosso site, ensinar de vez sobre a educação sexual
                    de
                    forma
                    delicada e diferente.</p>
                <br><br><br><br><br><br><br>
                <div class="table-legend">
                    <table class="tabela">
                        <span class="table-depoi">Depoimentos</span>
                        <thead class="tbl-head">
                            <tr class="classificacoes">
                                <th class="leve">Leve</th>
                                <th class="interm">Intermediário</th>
                                <th class="pesado">Pesado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="leve">Comentários curtos e simples</td>
                                <td class="interm">Comentários detalhados com exemplos e referências</td>
                                <td class="pesado">Análises profundas e técnicas com estudos de caso e dados
                                    estatísticos</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="txt-chat">
                    <span>Acesse nosso chatBot para se auto-ajudar</span>
                    <span>
                        <img src="assets/img/arrow-down-removebg-preview.png" class="arrow-down">
                    </span>
                    <br><br>
                    <div class="wrap">
                        <a href="assets/chat/chat.php">
                            <button class="button">
                                Conversar
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- CARROUSSEL -->
        <section id="terciary-infor">
            <div class="reveal">
                <iframe src="depoimentos.html" width="1300" height="400" frameborder="0"></iframe>
            </div>
        </section>

        <!-- PATROCINADORES -->
        <section class="main-patrocinics">
            <div class="reveal">
                <h5>Patrorcinadores</h5>
                <div class="imgs-rodape">
                    <a href="https://criancaevida.org.br/" target="_blank">
                        <img src="assets/img/crianca-e-vida-logo.png" class="rodape-img-patrocinics child-life">
                    </a>
                    <a href="https://www.projetouere.org.br/" target="_blank">
                        <img src="assets/img/projeto-uere-logo.png" class="rodape-img-patrocinics proj-uere">
                    </a>
                    <a href="https://www.mesintoseguro.com.br/" target="_blank">
                        <img src="assets/img/me-sinto-segura-logo.png" class="rodape-img-patrocinics sinto-security">
                    </a>
                    <a href="https://www.unicef.org/" target="_blank">
                        <img src="assets/img/UNICEF_Logo.png" class="rodape-img-patrocinics unicef">
                    </a>
                </div>
            </div>
        </section>

        <!-- BOTÃO DE VOLTAR -->
        <section class="btn-voltar">
            <button onclick="voltar()" class="voltar">⬆</button>
        </section>
    </main>

    <script src="assets/js/index.js"></script>
</body>

</html>
