<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Recuperação de Senha</title>
        <link rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/recuperar-senha.css">
    </head>

    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Recuperação de Senha</h3>
                        </div>
                        <div class="card-body">
                            <form action="../php/resgatar-senha.php" method="post">
                                <div class="form-group">
                                    <label class="small mb-1"
                                        for="emailInput">Senha nova</label>
                                    <input class="form-control py-4"
                                        id="emailInput"
                                        type="email"
                                        placeholder="Digite sua senha nova"
                                        required />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1"
                                        for="emailInput">Confirmar senha</label>
                                    <input class="form-control py-4"
                                        id="emailInput"
                                        type="email"
                                        placeholder="Confirme sua senha"
                                        required />
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-end mt-4 mb-0">
                                    <button class="btn btn-primary"
                                        type="submit">Recuperar Senha</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small"><a href="login.html">Voltar para a página de Login</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
