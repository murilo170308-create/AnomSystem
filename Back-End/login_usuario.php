<?php
session_start();
require 'conexao.php';

$email = trim($_POST['email']);
$senha = trim($_POST['senha']);

$sql = "SELECT * FROM cadastro_usuario WHERE email = '$email'";
$res = mysqli_query($conn, $sql);

if (!$res) {
    die("Erro no SQL: " . mysqli_error($conn));
}

if (mysqli_num_rows($res) == 1) {

    $usuario = mysqli_fetch_assoc($res);

    if ($usuario['senha'] == $senha) {

        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['email'] = $usuario['email'];

        header("Location: ../Front-End/TelaInicial.php");
        exit;

    } else {
        echo "Senha incorreta.";
    }

} else {
    echo "Usuário não encontrado.";
}
