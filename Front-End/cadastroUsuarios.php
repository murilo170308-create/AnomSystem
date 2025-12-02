<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Usuários</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/styleUsuario.css">
</head>
<body>

<div class="topbar">
  <h1>Usuários</h1>

  <div class="buttons">
    <button type="button" class="btn btn-danger" onclick="window.location.href='cadastro.php'">Voltar</button>
    <button type="button" class="btn btn-primary" onclick="window.location.href='novoUsuario.php'">
      + Novo Usuário
    </button>
  </div>
</div>

<div class="container-fluid mt-4">

  <table class="table table-bordered table-hover">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>CPF</th>
        <th>Nascimento</th>
        <th>Setor</th>
      </tr>
    </thead>
    <tbody>

      <?php
        require '../Back-End/conexao.php';

        $sql = "SELECT u.id_usuario, u.nome, u.email, u.cpf, u.data_nascimento, s.nome_setor
                FROM cadastro_usuario u
                JOIN setor s ON u.id_setor = s.id_setor";
        $res = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($res)){
            echo "
              <tr>
                <td>{$row['id_usuario']}</td>
                <td>{$row['nome']}</td>
                <td>{$row['email']}</td>
                <td>{$row['cpf']}</td>
                <td>{$row['data_nascimento']}</td>
                <td>{$row['nome_setor']}</td>
              </tr>
            ";
        }
      ?>

    </tbody>
  </table>

</div>

</body>
</html>
