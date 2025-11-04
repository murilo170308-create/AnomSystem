<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AnomSystem - Cadastros</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <!-- CSS principal -->
  <link rel="stylesheet" href="../css/styleCadastro.css">
</head>

<body>

  <!-- BARRA SUPERIOR -->
  <div class="topbar">
    <h1>Cadastros</h1>
    <button type="button" class="btn btn-danger">Voltar</button>
  </div>

  <!-- CONTEÚDO -->
  <div class="container">
    <div class="card" onclick="window.location.href='cadastroResponsavel.php'">
      <div class="card-text">
        <h2>Responsáveis</h2>
        <p>Cadastros de Responsáveis que irão ser incluídos na Anomalia</p>
      </div>
      <i class="bi bi-person-badge-fill"></i>
    </div>

    <div class="card" onclick="window.location.href='cadastroUsuarios.php'">
      <div class="card-text" >
        <h2>Usuário</h2>
        <p>Cadastros de Usuários que irão ter acesso ao sistema</p>
      </div>
      <i class="bi bi-envelope"></i>
    </div>

    <div class="card" onclick="window.location.href='cadastroArea.php'">
      <div class="card-text" >
        <h2>Área / Setor</h2>
        <p>Cadastros de Áreas ou Setores da empresa</p>
      </div>
      <i class="bi bi-building"></i>
    </div>

    <div class="card" onclick="window.location.href='cadastroRisco.php'">
      <div class="card-text">
        <h2>Grau de Risco</h2>
        <p>Cadastros de Graus de riscos de uma anomalia</p>
      </div>
      <i class="bi bi-exclamation-triangle"></i>
    </div>
  </div>

</body>

</html>