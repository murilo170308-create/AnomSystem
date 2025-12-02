<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Anomalias</title>

    <link rel="stylesheet" href="../css/styleAnomalias.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="topnav p-3 bg-primary d-flex gap-2">
    <button type="button" class="btn btn-light" onclick="window.location.href='incluir.php'">Incluir</button>
    <button type="button" class="btn btn-danger" onclick="window.location.href='TelaInicial.php'">Voltar</button>
</div>

<div class="container-fluid mt-4">

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID - ANOMALIA</th>
            <th>Data de Registro</th>
            <th>Relator</th>
            <th>Responsável</th>
            <th>Área / Setor</th>
            <th>Grau</th>
            <th>Prazo</th>
            <th>Descrição</th>
            <th style="width: 100px;">Ação</th>
        </tr>
    </thead>

    <tbody>

    <?php
    require '../Back-End/conexao.php';

    $sql = "
        SELECT 
            a.id,
            a.data,

            u1.nome AS relator,
            u2.nome AS responsavel,

            s.nome_setor,
            g.nivel_grau,
            p.nivel_prazo,
            d.descricao_anomalia

        FROM anomalias a

        JOIN cadastro_usuario u1 ON a.id_relator = u1.id_usuario
        JOIN cadastro_usuario u2 ON a.id_responsavel = u2.id_usuario

        JOIN setor s  ON a.id_setor  = s.id_setor
        JOIN grau g   ON a.id_grau   = g.id_grau
        JOIN prazo p  ON a.id_prazo  = p.id_prazo
        JOIN descricao d ON a.id = d.id_anomalia

        ORDER BY a.id DESC
    ";



    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res) == 0){
        echo "<tr><td colspan='7' class='text-center'>Nenhuma anomalia cadastrada.</td></tr>";
    }

    while($row = mysqli_fetch_assoc($res)){
        echo "
        <tr>
            <td>{$row['id']}</td>
            <td>{$row['data']}</td>
            <td>{$row['relator']}</td>
            <td>{$row['responsavel']}</td>
            <td>{$row['nome_setor']}</td>
            <td>{$row['nivel_grau']}</td>
            <td>{$row['nivel_prazo']}</td>
            <td>{$row['descricao_anomalia']}</td>
            <td class='text-center'>
                <div class='dropdown'>
                    <button class='btn btn-secondary btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown'>
                        ⋮
                    </button>
                    <ul class='dropdown-menu'>
                        <li>
                            <a class='dropdown-item' href='alterar.php?id={$row['id']}'>
                                Alterar
                            </a>
                        </li>
                        <li>
                            <a class='dropdown-item text-danger' 
                               href='../Back-End/excluir_anomalia.php?id={$row['id']}'
                               onclick=\"return confirm('Deseja realmente excluir esta anomalia?')\">
                                Excluir
                            </a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
        ";
    }
    ?>

    </tbody>
</table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
