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
                                                document.querySelector('.infor-main').style.backgroundImage = 'radial-gradient(circle at center, #ff96a8, #8d3a69)';
                                            </script>";
                                        } else if ($dadosUser['genero'] == 'masculino') {
                                            echo "
                                            <script>
                                                console.log('Passsou no masculino');
                                                document.querySelector('.infor-main').style.backgroundImage = 'radial-gradient(circle at center, #9d96ff, #423a8d);';
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
                <div class="slider-container">
                    <button class="slider-button prev-button">&larr;</button>
                    <button class="slider-button next-button">&rarr;</button>
                    <div class="slider">
                        <div class="slide active">
                            <h3> <span>|</span> Rio de Janeiro </h3>
                            <p>“A primeira vez foi quando criança, eu tinha no máximo 11 anos, estava em Araruama,
                                meus
                                pais andavam atrás de mim pois eles diziam que era necessário para que não me
                                perdessem
                                de vista. Pois bem, estava tudo normal quando um homem passando ao nosso lado
                                colocou a
                                mão por dentro da minha blusa e colocou o pouquinho de peito que eu tinha pra fora.
                                Foi
                                uma ação rápida e ninguém viu. Me calei e me arrumei rapidamente. Senti vergonha de
                                mim
                                e nojo. Até hoje ninguém sabe disso.”</p>
                        </div>
                        <div class="slide">
                            <h3><span>|</span>Rio de Janeiro (Leve)</h3>
                            <p>“Estávamos, minha amiga e eu, curtindo o Carnaval em Cabo Frio, há uns 10 anos.
                                Passamos
                                por um grupo de homens que nos jogou para dentro da roda e disse que tínhamos que
                                beija-los. Eu disse que não os beijaria e ele falou: quem não beijar, toma porrada.
                                Minha amiga e eu abaixamos a cabeça e tentamos nos proteger com o braços. Levamos
                                tapas
                                e socos.”</p>
                        </div>
                        <div class="slide">
                            <h3><span class="inter">|</span>São Paulo (Intermedario)</h3>
                            <p>“Eu estava ficando com um cara, sem muita vontade. Minha amiga estava ficando com um
                                amigo dele, então, acabou acontecendo. Estava beijando ele e estávamos conversando e
                                quando vi, ele abriu a calça e pôs o pênis para fora. Na hora, eu não entendi e acho
                                que
                                de nervoso, ri, pensando numa brincadeira sem graça e disse pra ele “guardar isso”.
                                Ele
                                riu, malicioso, pegou o pênis com a mão e me disse “vai, só uma chupadinha!” Aquilo
                                me
                                embrulhou o estômago e ainda me sentindo meio culpada, me afastei dele. Culpada de
                                que,
                                não sei. Ai, gritei a minha amiga que a esperaria na parte iluminada dá rua. No
                                outro
                                dia, que fomos de novo pra esse lugar é encontramos essa turma, esse cara nem se
                                aproximou. Tudo isso deve ter acontecido em 2012 ou 2013 e por alguns dias, ficava
                                com
                                medo de chegar perto de homens.”</p>
                        </div>
                        <div class="slide">
                            <h3><span class="pesa">|</span>Amazonas (Pesado)</h3>
                            <p>“Aqui no Amazonas tem o festival folclórico voltado para o Boi-Bumbá, que acontece
                                normalmente no meio do ano, na cidade de Parintins. Só que existem outros eventos
                                voltados pra isso na capital, Manaus, um deles acontece no período do carnaval e se
                                chama CarnaBoi.

                                Eu frequentei o CarnaBoi por alguns anos. No último que fui, aconteceu o episódio
                                que
                                vou relatar. Eu tava com alguns amigos, saí pra comprar cerveja numa banca com dois
                                deles. Na ida pra lá um moço me segurou pelo braço e disse: “Ei. Quer que eu te leve
                                pro
                                meu carro?”. No susto, eu só puxei o braço e continuei andando. Meus amigos olharam
                                e
                                perguntaram se tava tudo bem.

                                Na volta, meus amigos iam na frente, esse mesmo moço me puxou pela cintura e disse
                                que
                                tava doído pra me “comer”, eu empurrei ele, então ele me puxou pela camisa e disse
                                que
                                eu ia pro carro dele, querendo ou não. Eu consegui me soltar e cheguei até os meus
                                amigos.

                                Na hora que parei ao lado deles, eu fui arrastada pelo cabelo. Eu tinha o cabelo
                                comprido, até o fim das costas, e foi a primeira coisa que esse moço achou. Eu caí
                                no
                                chão e ele me arrastou. Meus amigos bateram nele, foi uma confusão.

                                Ele me soltou e eu nunca mais fui pra evento nenhum de carnaval. Ele não conseguiu
                                me
                                levar pro carro, mas eu fico pensando: e se eu tivesse ido comprar cerveja sozinha”
                            </p>
                        </div>
                        <div class="slide">
                            <h3><span>|</span>Ceará</h3>
                            <p>“Trabalhei em uma empresa bem pequena e era a única menina que almoçava com os
                                meninos.
                                Eu escutei algumas coisas que me deixaram sem jeito, tipo ‘como você se sente sendo
                                a
                                menina mais bonita daqui?’ ou ‘casa comigo?’. Até aí, eu até levava na brincadeira,
                                mas
                                um dia, um deles fez comentários sobre meus seios, que são grandes, o que me deixou
                                extremamente desconfortável. Em outra vez, combinamos de fazer cachorro quente no
                                refeitório. Foi quando um deles disse: ‘eu trago a salsicha e você traz o quê?’, e
                                sorriu para mim.”</p>
                        </div>
                        <div class="slide">
                            <h3><span>|</span>Ceará</h3>
                            <p>“Trabalhei de hostess em um restaurante. O maître começou a fazer convites para
                                sairmos
                                para beber e eu, sempre educada, dava um jeito de recusar sem constrangê-lo. Até que
                                um
                                dia ele pediu para mim uma foto da minha vagina. Depois daquele dia, me afastei e
                                evitei
                                todo tipo de contato. Ele começou a ser agressivo, colocar defeitos no meu trabalho
                                e
                                alterar escalas para que eu não tirasse folga. Fiquei irritada e disse que jamais
                                abriria as pernas para ele em troca de nada ali dentro. Ele me obrigou a deixar meu
                                posto e ir embora no meio do expediente. No dia seguinte, contei ao dono do
                                restaurante,
                                que me perguntou se eu não estaria inventando essa história. De vítima, passei a ser
                                vilã. Todos ganharam aumento, menos eu.”</p>
                        </div>
                        <div class="slide">
                            <h3><span class="inter">|</span>Ceará</h3>
                            <p>"Fui abusada aos 8 anos por um amigo do pai, um homem que na época era casado e
                                frequentava a casa da família. A parte mais difícil é não conseguir falar sobre o
                                abuso
                                com ninguém, nem mesmo com psicólogos. Por mais que eu tente, as palavras não saem”
                            </p>
                        </div>
                    </div>
                </div>
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
