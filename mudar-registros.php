<?php
session_start();
include("assets/php/conexao.php");

$idUsuario = $_SESSION['login_user'];
if (isset($_POST['upload']) && isset($_POST['idUsuario'])) {
    $arquivo = $_FILES['fotoPerfil'];

    function insert($con, $error, $size, $name, $tmp_name, $idUsuario)
    {
        if ($error) die("Deu erro irmão");
        if ($size > 2097152) die("Muito grande irmão");

        $pasta = 'assets/files/';
        $nomeArquivo = $name;
        $novoNomeArquivo = $idUsuario . '_' . uniqid();
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
        $patch = $pasta . $novoNomeArquivo . '.' . $extensao;

        if ($extensao != 'png' && $extensao != 'jpg') die("Tipo de arquivo não aceito");

        $deuCerto = move_uploaded_file($tmp_name, $patch);
        if ($deuCerto) {
            $con->query("UPDATE cadastro SET file_user = '$patch' WHERE codigo = '$idUsuario'");
            return true;
        } else {
            return false;
        }
    }

    $tudoCerto = insert($conexao, $arquivo['error'], $arquivo['size'], $arquivo['name'], $arquivo['tmp_name'], $idUsuario);
    if ($tudoCerto) {
        echo "<p>Foto de perfil atualizada com sucesso!</p>";
    } else {
        echo "<p>Erro ao atualizar foto de perfil</p>";
    }
}

$sql_query = $conexao->query("SELECT file_user FROM cadastro WHERE codigo = '$idUsuario'");

while ($usuario = $sql_query->fetch_assoc()) {
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/mudar-registro.css">
        <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

        <title>Mudar Registro</title>
    </head>

    <body>
        <div class='container'>
            <fieldset>
                <form class='myForm' method='post' action='' enctype='multipart/form-data'>
                    <div class="profile-image"><img src='<?php echo $usuario['file_user'];
                                                        } ?>' alt='img' name='fotoPerfil'></div>
                    <input type='file' class='update-img' id="fileInput" name='fotoPerfil'>
                    <button class='update-img' onclick=' event.preventDefault();document.getElementById("fileInput").click()'>Mudar foto</button>
                    <input type='hidden' name='idUsuario' value='<?php echo $idUsuario; ?>'>
                    <legend>Configurar perfil</legend>
                    <label for='nomeUpdate'>Nome</label>
                    <input type='text' name='nomeUpdate' id='nomeUpdate' value='Marcelo'>
                    <label for='emailUpdate'>E-mail</label>
                    <input type='text' name='emailUpdate' value='example@gmail.com'>
                    <label for='senhaUpdate'>Senha</label>
                    <input type='password' name='senhaUpdate' class='senhaUpdate' value='sjd'>
                    <abbr title='Mostrar senha'>
                        <span class='show-senha'>👀</span>
                    </abbr>
                    <label for='idadeUpdate'>Idade</label>
                    <input type='number' name='idadeUpdate' value='17'>
                    <label for='generoUpdate'>Gênero</label>
                    <input type='text' name='generoUpdate' value='Masculino'>
                    <div class='btn-group'>
                        <button type='submit' class='update' name='upload'>Atualizar</button>
                        <button type='submit' class='del'>Excluir</button>
                    </div>
                </form>
            </fieldset>
            <div class="overlay">
                <img src="" alt="Ampliar Imagem">
            </div>
        </div>

        <script src="assets/js/mudar-registro.js"></script>
    </body>

    </html>
