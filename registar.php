<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible"
            content="IE=edge">
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet"
            href="assets/css/registrar.css">
        <link rel="shortcut icon"
            href="assets/img/logo.png"
            type="image/x-icon">
        <title>Registrar</title>
    </head>

    <body>
        <section class="vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-20">
                        <div class="card"
                            style="border-radius: 1rem; height: 100vh;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="assets/img/login.PNG"
                                        alt="login form"
                                        class="img-fluid"
                                        style="border-radius: 2rem; padding: 30px; height: 100vh;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form action="assets/php/registrar.php"
                                            method="post">
                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <span class="h1 fw-bold mb-0">
                                                    <img src="assets/img/logo.png"
                                                        class="fas"
                                                        alt="" />
                                                    Registar
                                                </span>
                                            </div>

                                            <h5 class="fw-normal mb-3 pb-3"
                                                style="letter-spacing: 1px;">Faça registo em sua conta</h5>

                                            <div class="col01">
                                                <div class="form-outline mb-4">
                                                    <input type="text"
                                                        id="form2Example17"
                                                        class="form-control form-control-lg"
                                                        name="nome"
                                                        required />
                                                    <label class="form-label"
                                                        for="form2Example17">Nome <span
                                                            style="color: red;">*</span></label>
                                                </div>
                                                <div class="form-outline mb-4">
                                                    <input type="email"
                                                        id="form2Example17"
                                                        class="form-control form-control-lg"
                                                        name="email"
                                                        required />
                                                    <label class="form-label"
                                                        for="form2Example17">Email <span
                                                            style="color: red;">*</span></label>
                                                </div>
                                            </div>

                                            <div class="col02">
                                                <div class="form-outline mb-4">
                                                    <input type="password"
                                                        id="form2Example27"
                                                        class="form-control form-control-lg"
                                                        name="senha"
                                                        required />
                                                    <label class="form-label"
                                                        for="form2Example27">Senha <span
                                                            style="color: red;">*</span></label>
                                                </div>
                                                <div class="form-outline mb-4">
                                                    <input type="number"
                                                        id="form2Example27"
                                                        class="form-control form-control-lg"
                                                        name="idade"
                                                        required />
                                                    <label class="form-label"
                                                        for="form2Example27">Idade <span
                                                            style="color: red;">*</span></label>
                                                </div>
                                                <div class="form-outline mb-4">
                                                    <label class="form-label"
                                                        for="form2Example27">Gênero <span
                                                            style="color: red;">*</span></label><br>
                                                    <input type="radio"
                                                        id="form2Example27"
                                                        value="rgb(67, 67, 164)"
                                                        name="genero" />
                                                    <label for="form2Example27">Masculino</label>
                                                    <input type="radio"
                                                        id="form2Example27"
                                                        value="pink"
                                                        name="genero" />
                                                    <label for="form2Example27">Feminino</label>
                                                    <input type="radio"
                                                        id="form2Example27"
                                                        value="linear-gradient(to right, #ffc0cb, #ff0000, #ffa500, #ffff00, #008000, #0000ff, #ee82ee)"
                                                        name="genero" />
                                                    <label for="form2Example27">LGBTQIA+</label>
                                                    <br>
                                                    <input type="radio"
                                                        id="form2Example27"
                                                        value="gray"
                                                        name="genero" />
                                                    <label for="form2Example27">Prefiro não dizer</label>
                                                </div>
                                            </div>

                                            <div class="pt-1 mb-4">
                                                <input class="btn btn-dark btn-lg btn-block"
                                                    type="submit"
                                                    onclick="mudarCorGenero()"
                                                    value="Registrar">
                                            </div>
                                            <p class="mb-5 pb-lg-2"
                                                style="color: #393f81;">Já tem uma conta? <a href="login.html"
                                                    style="color: #393f81;">Loge-se</a></p>
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
        <script src="assets/js/registro.js"></script>
    </body>

</html>