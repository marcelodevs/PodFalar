<?php
session_start();
include_once('./assets/php/conexao.php');
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
        <meta http-equiv="X-UA-Compatible"
            content="IE=edge">
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon"
            href="assets/img/logo.png"
            type="image/x-icon">
        <link rel="stylesheet"
            href="assets/css/index.css">
        <link rel="stylesheet"
            href="assets/css/animation/keyframe.css">
        <link rel="stylesheet"
            href="assets/css/media-query.css">
        <title>PodFalar</title>
    </head>

    <body>

        <header>
            <nav id="menu">
                <div>
                    <span class="logo"
                        translate="no">
                        <img src="assets/img/podfalar-logo.png"
                            class="podfalar-logo">
                        <span class="logo-txt-lateral">PodFalar</span>
                    </span>
                </div>
                <ul class="lista">
                    <a href="#"
                        class="link">Home</a>
                    <a href="depoimentos.html"
                        class="link">Depoimentos</a>
                    <a href="registar.html"
                        class="link">Registrar</a>
                    <a href="auto-ajuda.html"
                        class="link">Auto-ajuda</a>
                    <a href="listar-dicas.html"
                        class="link">Listar de Dicas</a>
                </ul>
                <div class="menu-responsive">
                    <button class="navbar burguer"
                        onclick="toggleMenu()"></button>
                    <div class="menu">
                        <nav>
                            <a href="#"
                                style="animation-delay: .2s;">Home</a>
                            <a href="depoimentos.html"
                                style="animation-delay: .3s;">Depoimentos</a>
                            <a href="registar.html"
                                style="animation-delay: .4s;">Registrar</a>
                            <a href="auto-ajuda.html"
                                style="animation-delay: .5s;">Auto-ajuda</a>
                            <a href="listar-dicas.html"
                                style="animation-delay: .6s;">Listar dicas</a>
                        </nav>
                    </div>
                </div>
                <span>
                    <details>
                        <summary>
                            <img src="assets/img/user.png"
                                alt="user"
                                class="user">
                        </summary>
                        <section class="details">
                            <h3 class="nome"
                                style="font-family: sans-serif;">
                                <?php
                            if ($dadosUser == '') {
                                echo '';
                            } else {
                                echo $dadosUser['nome'];
                            }
                            ?>
                                <abbr title="Editar perfil"
                                    class="abreviation">
                                    <a href="assets/html/mudar-registros.html"
                                        target="_blank"
                                        class="link-user">✎</a>
                                </abbr>
                                <abbr title="Sair"
                                    class="abreviation">
                                    <a href="assets/php/logout.php"
                                        class="link-user out">Sair</a>
                                </abbr>
                            </h3>
                            <hr>
                            <span style="font-family: sans-serif;">
                                Email:
                                <span style="font-family: sans-serif;">
                                    <?php
                                if ($dadosUser == '') {
                                    echo '';
                                } else {
                                    echo $dadosUser['email'];
                                }
                                ?>
                                </span>
                                <br>
                                <span style="font-family: sans-serif;">
                                    Gênero:
                                    <span style="font-family: sans-serif;">
                                        <?php
                                    if ($dadosUser == '') { // Verifica se os dados do usuário é nulo
                                        echo '';
                                    } else {
                                        echo $dadosUser['genero'];
                                    }
                                    ?>
                                    </span>
                                </span>
                                <br>
                                <span style="font-family: sans-serif;">
                                    Idade:
                                    <span style="font-family: sans-serif;">
                                        <?php
                                    if ($dadosUser == '') {
                                        echo '';
                                    } else {
                                        echo $dadosUser['idade'];
                                    }
                                    ?>
                                    </span>
                                </span>
                        </section>
                    </details>
                </span>
            </nav>
        </header>

        <main>
            <section id="main-text-img"></section>

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
                            <img src="assets/img/arrow-down-removebg-preview.png"
                                class="arrow-down">
                        </span>
                        <button class="btn-chat">
                            <a href="#">
                                Conversar
                            </a>
                        </button>
                    </div>
                </div>
            </section>

            <section id="quarta-infor">
                <div class="reveal">
                    <div class="container"
                        id="container">
                        <div class="form-container sign-up-container">
                            <form action="assets/php/registrar.php">
                                <h1 class="create-conta">Criar Conta</h1>
                                <input type="text"
                                    placeholder="Nome"
                                    name="nome" />
                                <input type="email"
                                    placeholder="Email"
                                    name="email" />
                                <input type="password"
                                    placeholder="Password"
                                    name="senha" />
                                <input type="number"
                                    placeholder="Idade"
                                    name="idade" />
                                <input type="text"
                                    placeholder="Gênero"
                                    name="genero" />
                                <button class="btn">Inscrever-se</button>
                            </form>
                        </div>
                        <div class="form-container sign-in-container">
                            <form action="assets/php/logar.php">
                                <h1 class="create-conta">Entrar</h1>
                                <input type="email"
                                    placeholder="Email" />
                                <input type="password"
                                    placeholder="Password" />
                                <a href="#">Esqueceu sua senha?</a>
                                <button class="btn">Entrar</button>
                            </form>
                        </div>
                        <div class="overlay-container">
                            <div class="overlay">
                                <div class="overlay-panel overlay-left">
                                    <h1 class="create-conta">Bem vindo de volta!</h1>
                                    <p class="p">Para se manter conectado conosco, faça o login com suas informações
                                        pessoais</p>
                                    <button class="ghost btn"
                                        id="signIn">Entrar</button>
                                </div>
                                <div class="overlay-panel overlay-right">
                                    <h1 class="create-conta">Olá amigo!</h1>
                                    <p class="p">Introduza os seus dados pessoais e comece a viajar connosco</p>
                                    <button class="ghost btn"
                                        id="signUp">Inscrever-se</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="terciary-infor">
                <div class="reveal">

                </div>
            </section>

            <section class="main-patrocinics">
                <div class="reveal">
                    <h5>Patrorcinadores</h5>
                    <div class="imgs-rodape">
                        <a href="https://criancaevida.org.br/"
                            target="_blank">
                            <img src="assets/img/crianca-e-vida-logo.jpg"
                                class="rodape-img-patrocinics">
                        </a>
                        <a href="https://www.projetouere.org.br/"
                            target="_blank">
                            <img src="assets/img/projeto-uere-logo.jpg"
                                class="rodape-img-patrocinics">
                        </a>
                        <a href="https://www.mesintoseguro.com.br/"
                            target="_blank">
                            <img src="assets/img/me-sinto-segura-logo.png"
                                class="rodape-img-patrocinics flex-wrap">
                        </a>
                        <a href="https://www.unicef.org/"
                            target="_blank">
                            <img src="assets/img/UNICEF_Logo.png"
                                class="rodape-img-patrocinics flex-wrap">
                        </a>
                    </div>
                </div>
            </section>

            <section class="btn-voltar">
                <button onclick="voltar()"
                    class="voltar">⬆</button>
            </section>
        </main>

        <script src="assets/js/index.js"></script>
    </body>

</html>
