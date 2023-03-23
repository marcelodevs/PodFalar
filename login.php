<?php
session_start();

if (!isset($_SESSION['email'])) {
    if (isset($_POST['submit'])) {
        if (strlen($_POST['email']) == 0 || strlen($_POST['senha']) == 0) {
            print_r("<div class='container-fluid text-center p-3 ms-1 rounded-4 border border-danger' style='background: rgba(255, 0, 0, .6);'>
                            <p class='mb-0 fst-italic text-light' style='font-family: verdana, arial, serif;'>Por favor, preencha todos os campos!</p>
                        </div>
                ");
        } else if (strlen($_POST['senha']) < 7) {
            print_r("<div class='container-fluid text-center p-3 border border-danger' style='background: rgba(255, 0, 0, .6);'>
                            <p class='mb-0 fst-italic text-light' style='font-family: verdana, arial, serif;'>A senha deve ter no mínimo 7 caracteres!</p>             
                        </div>
                ");
        } else {
            include("../conexaoDB/conexaoUser.php");

            $email = filter_input(INPUT_POST, "email", FILTER_DEFAULT);
            $senha = filter_input(INPUT_POST, "senha", FILTER_DEFAULT);

            $codigo_sql = "SELECT * FROM $tabela WHERE email = '$email'";

            $sql_query = mysqli_query($conexaoUsuario, $codigo_sql);

            if ($sql_query) {
                $dados_usuario = mysqli_fetch_assoc($sql_query);
                if (password_verify($senha, $dados_usuario['senha'])) {
                    // Pegando os dados do usuário que estão no DB e armazenando nas variáveis de tipo sessão
                    $_SESSION['id_usuario'] = $dados_usuario['id_usuario'];
                    $_SESSION['nome'] = $dados_usuario['nome'];
                    $_SESSION['email'] = $dados_usuario['email'];
                    // $_SESSION['senha'] = $dados_usuario['senha'];

                    header('Location: ../principal/indexPrincipal.php');
                } else {
                    unset($_SESSION['email']);
                    unset($_SESSION['senha']);

                    header("Location: erro.php");
                }
            } else {
                unset($_SESSION['email']);
                unset($_SESSION['senha']);

                header("Location: erro.php");
            }
        }
    }
} else {
    header('Location: ../principal/indexPrincipal.php');
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
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet"
            href="assets/css/login.css">
        <link rel="shortcut icon"
            href="assets/img/logo.png"
            type="image/x-icon">
        <title>Login</title>
    </head>

    <body>
        <section class="vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-20">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="assets/img/login.PNG"
                                        alt="login form"
                                        class="img-fluid"
                                        style="border-radius: 2em; padding: 30px; height: 92vh;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form method="post">
                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <span class="h1 fw-bold mb-0">
                                                    <img src="assets/img/logo.png"
                                                        class="fas"
                                                        alt="" />
                                                    Login
                                                </span>
                                            </div>

                                            <h5 class="fw-normal mb-3 pb-3"
                                                style="letter-spacing: 1px;">Faça login em sua conta</h5>

                                            <div class="col01">
                                                <div class="form-outline mb-4">
                                                    <input type="email"
                                                        id="form2Example17"
                                                        class="form-control form-control-lg"
                                                        name="emailLogin" />
                                                    <label class="form-label"
                                                        for="form2Example17">Email</label>
                                                </div>
                                                <div class="form-outline mb-4">
                                                    <input type="password"
                                                        id="form2Example27"
                                                        class="form-control form-control-lg"
                                                        name="senhaLogin" />
                                                    <label class="form-label"
                                                        for="form2Example27">Senha</label>
                                                </div>
                                            </div>

                                            <div class="pt-1 mb-4">
                                                <button class="btn btn-dark btn-lg btn-block"
                                                    type="submit">Logar</button>
                                            </div>

                                            <a class="small text-muted"
                                                href="esqueceu-senha.html"
                                                target="_blank">
                                                Esqueceu a senha?
                                            </a>
                                            <p class="mb-5 pb-lg-2"
                                                style="color: #393f81;">
                                                Não tem uma conta?
                                                <a href="registar.html"
                                                    target="_blank"
                                                    style="color: #393f81;">
                                                    Registre-se
                                                </a>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/login.js"></script>
    </body>

</html>
