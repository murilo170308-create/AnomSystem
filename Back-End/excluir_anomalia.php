<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require 'conexao.php';

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    die("ID inválido.");
}

$id = (int)$_GET['id'];

// Se tiver tabela descricao com FK ON DELETE CASCADE,
// basta deletar só da anomalias
$sql = "DELETE FROM anomalias WHERE id = $id";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: ../Front-End/anomalias.php");
    exit;
} else {
    echo "Erro ao excluir: " . mysqli_error($conn);
}
