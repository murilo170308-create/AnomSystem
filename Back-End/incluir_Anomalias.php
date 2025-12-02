<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require 'conexao.php';


        $id_relator     = $_POST['Relator'];
        $id_responsavel = $_POST['Responsavel'];
        $data           = $_POST['DataOcorrido'];
        $id_setor       = $_POST['Setor'];
        $id_grau        = $_POST['Grau'];
        $id_prazo       = $_POST['Prazo'];
        $descricao      = $_POST['Desc'];


        //VALIDAÇÃO BÁSICA

        if (
            empty($id_relator) || empty($id_responsavel) ||
            empty($data) || empty($id_setor) ||
            empty($id_grau) || empty($id_prazo) ||
            empty($descricao)
        ) {
            die("Erro: Todos os campos obrigatórios devem ser preenchidos.");
        }

        $sql1 = "
        INSERT INTO anomalias 
        (data, id_relator, id_responsavel, id_setor, id_grau, id_prazo) 
        VALUES 
        ('$data', '$id_relator', '$id_responsavel', '$id_setor', '$id_grau', '$id_prazo')
        ";

        $result1 = mysqli_query($conn, $sql1);

        if (!$result1) {
            die("Erro ao cadastrar anomalia: " . mysqli_error($conn));
        }

        $idAnomalia = mysqli_insert_id($conn);

        $sql2 = "
        INSERT INTO descricao (id_anomalia, descricao_anomalia)
        VALUES ('$idAnomalia', '$descricao')
        ";

        $result2 = mysqli_query($conn, $sql2);

        if (!$result2) {
            die("Erro ao cadastrar descrição: " . mysqli_error($conn));
        }

        header("Location: ../Front-End/anomalias.php");
        exit;
        ?>
</body>
</html>