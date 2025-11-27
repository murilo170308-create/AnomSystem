<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "conexao.php";

    if ($conn) {
        echo "Conexão funcionando! ✔";
    } else {
        echo "Erro ao conectar ❌";
    }
    ?>
</body>
</html>