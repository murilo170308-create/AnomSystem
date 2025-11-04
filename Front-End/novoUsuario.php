<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Usuario</title>
    <link rel="stylesheet" href="../css/styleNU.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="topbar">
        <h1>Cadastros de Usuários</h1>

        <div class="buttons">
            <button type="button" class="btn btn-warning">Cancelar</button>
            <button type="button" class="btn btn-primary" onclick="window.location.href='novoUsuario.php'">Salvar</button>
        </div>
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
        </div>
    </div>
</body>

</html>