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
        $cpf   = $_POST['cpf'];
        $dataN = $_POST['data_nascimento'];
        $dataA = $_POST['data_admissao'];
        $dataD = $_POST['data_demissao'];
        $senha = md5($_POST['senha']); // provisório
        $idSetor = $_POST['id_setor'];

        $sql = "INSERT INTO cadastro_usuario
        (nome, email, senha, cpf, data_nascimento, data_admissao, data_demissao, id_setor, senha_temporaria)
        VALUES
        ('$nome', '$email', '$senha', '$cpf', '$dataN', '$dataA', '$dataD', '$idSetor', 1)";

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