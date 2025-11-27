<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/styleincluir.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Incluir</title>
</head>

<body>

<div class="topnav"></div>
<h1>Incluir</h1>

<form action="../Back-End/incluir_Anomalias.php" method="POST">

    <div class="botoes">
        <button type="submit" class="btn btn-outline-success">Salvar</button>
        <button type="button" class="btn btn-outline-danger" onclick="window.location.href='anomalias.php'">Cancelar</button>
    </div>

    <div class="main-container">
        <div class="form-left">

            <label for="IdAnomlias">Id. Anomalia</label>
            <input type="text" id="IdAnomlias" name="IdAnomlias">

            <label for="Relator">Relator</label>
            <input type="text" id="Relator" name="Relator">

            <label for="Responsavel">Responsável</label>
            <input type="text" id="Responsavel" name="Responsavel">

            <label for="DataOcorrido">Data Ocorrido</label>
            <input type="date" id="DataOcorrido" name="DataOcorrido">

            <!-- MODAL do setor -->
            <label>Área / Setor</label>
            <div class="input-group mb-3">
                <input type="text" id="SetorNome" class="form-control" readonly>
                <input type="hidden" id="Setor" name="Setor">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSetor">
                    Selecionar
                </button>
            </div>

            <label>Grau de Risco</label>
            <div class="input-group mb-3">
                <input type="text" id="GrauNome" class="form-control" readonly>
                <input type="hidden" id="Grau" name="Grau">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalGrau">
                    Selecionar
                </button>
            </div>


            <label for="Desc">Descrição</label>
            <textarea id="Desc" name="Desc"></textarea>

            <label>Prazo de Ação</label>
            <div class="input-group mb-3">
                <input type="text" id="PrazoNome" class="form-control" readonly>
                <input type="hidden" id="Prazo" name="Prazo">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPrazo">
                    Selecionar
                </button>
            </div>

        </div>

        <fieldset>
            <legend>Dados de Classificação</legend>

            <legend>SPCIF</legend>

            <label>Fatal</label>
            <input type="checkbox" id="FAT"><br>

            <label>C.P.T</label>
            <input type="checkbox" id="CPT"><br>

            <label>Trabalho Restrito</label>
            <input type="checkbox" id="SPTR"><br>

            <label>Tratamento Médico</label>
            <input type="checkbox" id="SPT"><br>

            <label>Primeiros Socorros</label>
            <input type="checkbox" id="PS"><br>
        </fieldset>

        <fieldset>
            <legend>Incidente de Trabalho</legend>

            <label>Situação Insegura</label>
            <input type="checkbox" id="SI"><br>

            <label>Ato Inseguro</label>
            <input type="checkbox" id="AT"><br>

            <label>Quase Acidente</label>
            <input type="checkbox" id="QA"><br>
        </fieldset>
    </div>
</form>

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
                $sql = "SELECT * FROM setor ORDER BY nome_setor";
                $res = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($res)){
                    echo "
                        <tr>
                            <td>{$row['nome_setor']}</td>
                            <td>
                                <button type='button' 
                                        class='btn btn-success'
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

<!-- Modal do grau -->
<div class="modal fade" id="modalGrau" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Selecionar Grau de Risco</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Grau</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>

            <?php
              $sql = "SELECT * FROM grau ORDER BY nivel_grau";
              $res = mysqli_query($conn, $sql);

              while($row = mysqli_fetch_assoc($res)){
                  $id   = $row['id_grau'];
                  $nome = htmlspecialchars($row['nivel_grau'], ENT_QUOTES);

                  echo "
                    <tr>
                      <td>$nome</td>
                      <td>
                        <button type='button'
                                class='btn btn-success'
                                onclick=\"selecionarGrau($id, '$nome')\">
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

<!-- Modal do prazo -->
<div class="modal fade" id="modalPrazo" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Selecionar Prazo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Prazo</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>

            <?php
              $sql = "SELECT * FROM prazo ORDER BY nivel_prazo";
              $res = mysqli_query($conn, $sql);

              while($row = mysqli_fetch_assoc($res)){
                  $id   = $row['id_prazo'];
                  $nome = htmlspecialchars($row['nivel_prazo'], ENT_QUOTES);

                  echo "
                    <tr>
                      <td>$nome</td>
                      <td>
                        <button type='button'
                                class='btn btn-success'
                                onclick=\"selecionarPrazo($id, '$nome')\">
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


<!--Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="../Front-End/js/setor.js"></script>

</body>
</html>
