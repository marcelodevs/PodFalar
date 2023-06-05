<?php
session_start();
include("assets/php/conexao.php");

$idUsuario = $_SESSION['login_user'];

// Verifica se o formulário foi enviado e se o campo 'idUsuario' está definido
if (isset($_POST['upload']) && isset($_POST['idUsuario'])) {
    $arquivo = $_FILES['fotoPerfil'];

    // Função para inserir o arquivo no servidor
    function insert($con, $error, $size, $name, $tmp_name, $idUsuario)
    {
        // Verifica se ocorreu algum erro no upload do arquivo
        if ($error) die("Deu erro irmão");

        // Verifica se o tamanho do arquivo excede o limite
        if ($size > 2097152) die("Muito grande irmão");

        // Cria um caminho para a nova imagem que o usuário escolheu
        $pasta = 'assets/files/';
        $nomeArquivo = $name;
        $novoNomeArquivo = $idUsuario . '_' . uniqid();
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
        $patch = $pasta . $novoNomeArquivo . '.' . $extensao;

        // Verifica se a extensão do arquivo é suportada
        if ($extensao != 'png' and $extensao != 'jpg' and $extensao != 'jpeg') die("Tipo de arquivo não aceito");

        // Move o arquivo para a pasta de destino
        $deuCerto = move_uploaded_file($tmp_name, $patch);
        if ($deuCerto) {
            // Atualiza o caminho do arquivo no banco de dados
            $con->query("UPDATE cadastro SET file_user = '$patch' WHERE codigo = '$idUsuario'");
            return true;
        } else {
            return false;
        }
    }

    insert($conexao, $arquivo['error'], $arquivo['size'], $arquivo['name'], $arquivo['tmp_name'], $idUsuario);
}

$sql_query = $conexao->query("SELECT * FROM cadastro WHERE codigo = '$idUsuario'");

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
        <a href="index.php">
            <img src="assets/img/botao-voltar.png" class="img-btn-back">
        </a>
        <div class='container'>
            <fieldset>
                <form class='myForm' method='post' action='' enctype='multipart/form-data'>
                    <div class="profile-image"><img src='<?php echo $usuario['file_user']; ?>' alt='img' name='fotoPerfil'></div>
                    <input type='file' class='update-img' id="fileInput" name='fotoPerfil'>
                    <button class='update-img' onclick=' event.preventDefault();document.getElementById("fileInput").click()'>Mudar foto</button>
                    <input type='hidden' name='idUsuario' value='<?php echo $idUsuario; ?>'>
                    <label for='nomeUpdate'>Nome</label>
                    <input type='text' name='nomeUpdate' id='nomeUpdate' value='<?php echo $usuario['nome']; ?>'>
                    <label for='emailUpdate'>E-mail</label>
                    <input type='text' name='emailUpdate' value='<?php echo $usuario['email']; ?>'>
                    <label for='senhaUpdate'>Senha</label>
                    <input type='password' name='senhaUpdate' class='senhaUpdate' value='<?php echo $usuario['senha']; ?>'>
                    <abbr title='Mostrar senha'>
                        <span class='show-senha'>&#x1F441;</span>
                    </abbr>
                    <label for='idadeUpdate'>Idade</label>
                    <input type='number' name='idadeUpdate' value='<?php echo $usuario['idade']; ?>'>
                    <label for='generoUpdate'>Gênero</label>
                    <input type='text' name='generoUpdate' value='<?php echo $usuario['genero'];
                                                                } ?>'>
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
