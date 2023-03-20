<?php

include_once("registrar.php");

$emailLogin = filter_input(INPUT_POST, "emailLogin");
$senhaLogin = filter_input(INPUT_POST, "senhaLogin");

if ($emailLogin == $email and $senhaLogin == $senha) {
    echo "
    <script>
        alert('Bem vindo de volta!');
    </script>
    ";
    header("Location: ../index.html");
}
