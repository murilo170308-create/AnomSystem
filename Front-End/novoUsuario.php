<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo Usuário</title>

    <link rel="stylesheet" href="../css/styleNU.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="topbar">
    <h1>Cadastrar Novo Usuário</h1>

    <div class="buttons d-flex gap-2">
        <button type="button" class="btn btn-warning" onclick="window.location.href='cadastroUsuarios.php'">Cancelar</button>
        <button type="submit" class="btn btn-primary" form="formUsuario">Salvar</button>
    </div>

</div>

<div class="main-container">
    <div class="main-container">
        <form id="formUsuario" action="../Back-End/cadastrar_usuario.php" method="POST" class="container-fluid">
            <div class="row">

                <div class="col-md-6 mb-3">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
                </div>

                <div class="col-md-4 mb-3">
                <label>CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-control" required>
                </div>

                <div class="col-md-4 mb-3">
                <label>Data de Nascimento</label>
                <input type="date" name="data_nascimento" class="form-control" required>
                </div>

                <div class="col-md-4 mb-3">
                <label>Data de Admissão</label>
                <input type="date" name="data_admissao" class="form-control" required>
                </div>

                <div class="col-md-4 mb-3">
                <label>Data de Demissão</label>
                <input type="date" name="data_demissao" class="form-control">
                </div>

                <!-- ✅ SETOR COM MODAL -->
                <div class="col-md-8 mb-3">
                <label>Setor</label>
                <div class="input-group">
                    <input type="text" id="SetorNome" class="form-control" readonly>
                    <input type="hidden" id="Setor" name="id_setor">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSetor">
                    Selecionar
                    </button>
                </div>
                </div>

                <div class="col-md-6 mb-3">
                <label>Senha (padrão)</label>
                <input type="password" name="senha" class="form-control" value="123456" required>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal do setor -->
<div class="modal fade" id="modalSetor" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Selecionar Setor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Setor</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>

          <?php
          require '../Back-End/conexao.php';
          $sql = "SELECT * FROM setor";
          $res = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($res)) {
              echo "
              <tr>
                <td>{$row['nome_setor']}</td>
                <td>
                  <button type='button' class='btn btn-success'
                    onclick=\"selecionarSetor({$row['id_setor']}, '{$row['nome_setor']}')\">
                    Selecionar
                  </button>
                </td>
              </tr>
              ";
          }
          ?>

          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

    <script>
        document.getElementById("cpf").addEventListener("input", function () {
        let cpf = this.value.replace(/\D/g, '');

        if (cpf.length > 11) {
            cpf = cpf.slice(0, 11);
        }

        cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
        cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
        cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

        this.value = cpf;
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../AnomSystem/Front-end/js/setor"></script>


</body>
</html>
