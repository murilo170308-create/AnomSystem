<?php
require '../Back-End/conexao.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "
SELECT 
    a.id,
    a.data,
    a.id_relator,
    a.id_responsavel,
    a.id_setor,
    a.id_grau,
    a.id_prazo,
    u1.nome AS relator_nome,
    u2.nome AS responsavel_nome,
    s.nome_setor,
    g.nivel_grau,
    p.nivel_prazo,
    d.descricao_anomalia
FROM anomalias a
JOIN cadastro_usuario u1 ON a.id_relator = u1.id_usuario
JOIN cadastro_usuario u2 ON a.id_responsavel = u2.id_usuario
JOIN setor s ON a.id_setor = s.id_setor
JOIN grau g ON a.id_grau = g.id_grau
JOIN prazo p ON a.id_prazo = p.id_prazo
JOIN descricao d ON d.id_anomalia = a.id
WHERE a.id = $id
";

$res = mysqli_query($conn, $sql);
$dados = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Alterar Anomalia</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styleincluir.css">
</head>
<body>

    <h1>Alterar Anomalia</h1>

    <form action="../Back-End/alterar_Anomalia.php" method="POST">

    <input type="hidden" name="id_anomalia" value="<?= $dados['id'] ?>">

    <div class="botoes">
        <button type="submit" class="btn btn-success">Salvar</button>
        <button type="button" class="btn btn-danger" onclick="window.location.href='anomalias.php'">Cancelar</button>
    </div>

    <div class="container mt-3">

    <!-- RELATOR -->
    <label>Relator</label>
    <div class="input-group mb-3">
        <input type="text" id="RelatorNome" class="form-control" value="<?= $dados['relator_nome'] ?>" readonly>
        <input type="hidden" id="Relator" name="Relator" value="<?= $dados['id_relator'] ?>">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRelator">Selecionar</button>
    </div>

    <!-- RESPONSÁVEL -->
    <label>Responsável</label>
    <div class="input-group mb-3">
        <input type="text" id="ResponsavelNome" class="form-control" value="<?= $dados['responsavel_nome'] ?>" readonly>
        <input type="hidden" id="Responsavel" name="Responsavel" value="<?= $dados['id_responsavel'] ?>">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalResponsavel">Selecionar</button>
    </div>

    <!-- DATA -->
    <label>Data</label>
    <input type="date" name="Data" class="form-control mb-3" value="<?= $dados['data'] ?>">

    <!-- SETOR -->
    <label>Área / Setor</label>
    <div class="input-group mb-3">
        <input type="text" id="SetorNome" class="form-control" value="<?= $dados['nome_setor'] ?>" readonly>
        <input type="hidden" id="Setor" name="Setor" value="<?= $dados['id_setor'] ?>">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSetor">Selecionar</button>
    </div>

    <!-- GRAU -->
    <label>Grau de Risco</label>
    <div class="input-group mb-3">
        <input type="text" id="GrauNome" class="form-control" value="<?= $dados['nivel_grau'] ?>" readonly>
        <input type="hidden" id="Grau" name="Grau" value="<?= $dados['id_grau'] ?>">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalGrau">Selecionar</button>
    </div>

    <!-- PRAZO -->
    <label>Prazo</label>
    <div class="input-group mb-3">
        <input type="text" id="PrazoNome" class="form-control" value="<?= $dados['nivel_prazo'] ?>" readonly>
        <input type="hidden" id="Prazo" name="Prazo" value="<?= $dados['id_prazo'] ?>">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPrazo">Selecionar</button>
    </div>

    <!-- DESCRIÇÃO -->
    <label>Descrição</label>
    <textarea name="Desc" class="form-control mb-3"><?= $dados['descricao_anomalia'] ?></textarea>

    </div>
    </form>


    <div class="modal fade" id="modalRelator" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title">Selecionar Relator</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
            <table class="table table-hover">
            <thead>
                <tr>
                <th>Nome</th>
                <th>Ação</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $sql = "SELECT id_usuario, nome FROM cadastro_usuario ORDER BY nome";
            $res = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($res)){
                echo "
                <tr>
                    <td>{$row['nome']}</td>
                    <td>
                    <button type='button' class='btn btn-success'
                        onclick=\"selecionarRelator({$row['id_usuario']}, '{$row['nome']}')\"
                        data-bs-dismiss='modal'>
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

    <div class="modal fade" id="modalResponsavel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title">Selecionar Responsável</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
            <table class="table table-hover">
            <thead>
                <tr>
                <th>Nome</th>
                <th>Ação</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $sql = $sql = "SELECT id_usuario, nome 
                FROM cadastro_usuario
                WHERE responsavel = 1
                ORDER BY nome";

            $res = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($res)){
                echo "
                <tr>
                    <td>{$row['nome']}</td>
                    <td>
                    <button type='button' class='btn btn-success'
                        onclick=\"selecionarResponsavel({$row['id_usuario']}, '{$row['nome']}')\"
                        data-bs-dismiss='modal'>
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

    <div class="modal fade" id="modalSetor" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title">Selecionar Setor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
            <table class="table table-hover">
            <tbody>

            <?php
            $sql = "SELECT * FROM setor ORDER BY nome_setor";
            $res = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($res)) {
                echo "
                <tr>
                    <td>{$row['nome_setor']}</td>
                    <td>
                    <button type='button' class='btn btn-success'
                        onclick=\"selecionarSetor({$row['id_setor']}, '{$row['nome_setor']}')\"
                        data-bs-dismiss='modal'>
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

    <div class="modal fade" id="modalGrau" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title">Selecionar Grau</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
            <table class="table table-hover">
            <tbody>

            <?php
            $sql = "SELECT * FROM grau ORDER BY nivel_grau";
            $res = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($res)) {
                echo "
                <tr>
                    <td>{$row['nivel_grau']}</td>
                    <td>
                    <button type='button' class='btn btn-success'
                        onclick=\"selecionarGrau({$row['id_grau']}, '{$row['nivel_grau']}')\"
                        data-bs-dismiss='modal'>
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

    <div class="modal fade" id="modalPrazo" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title">Selecionar Prazo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
            <table class="table table-hover">
            <tbody>

            <?php
            $sql = "SELECT * FROM prazo ORDER BY nivel_prazo";
            $res = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($res)) {
                echo "
                <tr>
                    <td>{$row['nivel_prazo']}</td>
                    <td>
                    <button type='button' class='btn btn-success'
                        onclick=\"selecionarPrazo({$row['id_prazo']}, '{$row['nivel_prazo']}')\"
                        data-bs-dismiss='modal'>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Front-End/js/setor.js"></script>

</body>
</html>
