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

        $nome  = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $cpf   = $_POST['cpf'];
        $dataN = $_POST['data_nascimento'];
        $idSetor = $_POST['id_setor'];
        $responsavel = $_POST['responsavel'];

        $sql = "INSERT INTO cadastro_usuario
        (nome, email, senha, cpf, data_nascimento, id_setor, responsavel)
        VALUES
        ('$nome', '$email', '$senha', '$cpf', '$dataN','$idSetor','$responsavel')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: ../Front-End/cadastroUsuarios.php");
            exit;
        } else {
            echo "Erro ao cadastrar usuário: " . mysqli_error($conn);
        }
    ?>
</body>
</html>