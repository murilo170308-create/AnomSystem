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

        $relator = $_POST["Relator"];
        $responsavel = $_POST["Responsavel"];
        $dataOcorrido = $_POST["DataOcorrido"];
        $setor = $_POST["Setor"];
        $desc = $_POST["Desc"];

        $sql1 = "INSERT INTO anomalias (relator, responsavel, data, area_setor) values ('$relator', '$responsavel', '$dataOcorrido', '$setor')";

        $result1 = mysqli_query($conn, $sql1);

        if(!$result1){
            die("Erro ao cadastrar anomalia: " . mysqli_error($conn));
        }

        $idAnomalia = mysqli_insert_id($conn);

        $sql2 = "INSERT INTO descricao (id_anomalia, descricao_anomalia) values ('$idAnomalia', '$desc')";

        $result2 = mysqli_query($conn, $sql2);

        if($result2 == true){
            echo "Cadastrado com sucesso!";
        }else{
            echo "Erro ao cadastrar";
        }
    ?>
</body>
</html>