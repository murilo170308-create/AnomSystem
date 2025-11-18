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
    <div class="topnav">

    </div>
    <h1>Incluir</h1>

    <div class="botoes">
        <button type="button" class="btn btn-outline-success" onclick="window.location.href='anomalias.php'">Salvar</button>
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

            <label for="Setor">Área / Setor</label>
            <input type="text" id="Setor" name="Setor">

            <label for="GrauRisco">Grau de Risco</label>
            <input type="text" id="GrauRisco" name="GrauRisco">

            <label for="Desc">Descrição</label>
            <textarea name="Desc" id="Desc"></textarea>

            <div class="prazoTempo">
              <legend>Prazo</legend>

              <label for="Curto">Curto</label>
              <input type="radio" name="prazo" id="Curto">

              <label for="Médio">Médio</label>
              <input type="radio" name="prazo" id="Médio">

              <label for="Alto">Alto</label>
              <input type="radio" name="prazo" id="alto">
            </div>
        </div>

        <fieldset>
            <legend>Dados de Classificação</legend>

            <legend>SPCIF</legend>
            <label for="FAT">Fatal</label>
            <input type="checkbox" id="FAT"><br>

            <label for="CPT">C.P.T</label>
            <input type="checkbox" id="CPT"><br>

            <label for="SPTR">Trabalho Restrito</label>
            <input type="checkbox" id="SPTR"><br>

            <label for="SPT">Tratamento Médico</label>
            <input type="checkbox" id="SPT"><br>

            <label for="PS">Primeiros Socorros</label>
            <input type="checkbox" id="PS"><br>
        </fieldset>

        <fieldset>
            <legend>Incidente de Trabalho</legend>
                <label for="SI">Situação Insegura</label>
                <input type="checkbox" id="SI"><br>

                <label for="AT">Ato Inseguro</label>
                <input type="checkbox" id="AT"><br>

                <label for="QA">Quase Acidente</label>
                <input type="checkbox" id="QA"><br>
        </fieldset>
    </div>
        
</body>

</html>
