<?php
require 'conexao.php';

$id          = isset($_POST['id_anomalia']) ? $_POST['id_anomalia'] : null;
$data        = isset($_POST['Data']) ? $_POST['Data'] : null;
$id_relator  = isset($_POST['Relator']) ? $_POST['Relator'] : null;
$id_resp     = isset($_POST['Responsavel']) ? $_POST['Responsavel'] : null;
$id_setor    = isset($_POST['Setor']) ? $_POST['Setor'] : null;
$id_grau     = isset($_POST['Grau']) ? $_POST['Grau'] : null;
$id_prazo    = isset($_POST['Prazo']) ? $_POST['Prazo'] : null;
$descricao   = isset($_POST['Desc']) ? $_POST['Desc'] : null;


 //VALIDAÇÃO


if (
    empty($id) || empty($data) || empty($id_relator) || empty($id_resp) ||
    empty($id_setor) || empty($id_grau) || empty($id_prazo) || empty($descricao)
) {
    die("Erro: Todos os campos obrigatórios devem ser preenchidos.");
}

/* ================================
   3. ATUALIZA A ANOMALIA
================================ */

$sql = "
    UPDATE anomalias SET
        data = '$data',
        id_relator = '$id_relator',
        id_responsavel = '$id_resp',
        id_setor = '$id_setor',
        id_grau = '$id_grau',
        id_prazo = '$id_prazo'
    WHERE id = '$id'
";

if (!mysqli_query($conn, $sql)) {
    die("Erro ao atualizar anomalia: " . mysqli_error($conn));
}

$sqlDesc = "
    UPDATE descricao
    SET descricao_anomalia = '$descricao'
    WHERE id_anomalia = '$id'
";

if (!mysqli_query($conn, $sqlDesc)) {
    die("Erro ao atualizar descrição: " . mysqli_error($conn));
}

header("Location: ../Front-End/anomalias.php");
exit;
