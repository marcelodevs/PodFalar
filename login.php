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

                                        <form action="assets/php/logar.php"
                                            method="post">
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
                                                        name="email" />
                                                    <label class="form-label"
                                                        for="form2Example17">Email</label>
                                                </div>
                                                <div class="form-outline mb-4">
                                                    <input type="password"
                                                        id="form2Example27"
                                                        class="form-control form-control-lg"
                                                        name="senha" />
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
