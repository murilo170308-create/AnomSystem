<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../css/styleLogin.css">
</head>

<body>
  <div class="container">

    <div class="left">
      <img src="../img/logo.png" alt="Logo do sistema">
    </div>

    <div class="right">
      <h1>Anom<span>System</span></h1>

      <form action="../Back-End/login_usuario.php" method="POST">

        <div class="form-group">
          <input type="email" name="email" placeholder="Digite seu Email" required>
        </div>

        <div class="form-group">
          <input type="password" name="senha" placeholder="Digite sua senha" required>
        </div>

        <button type="submit" class="btn">Entrar</button>

      </form>

    </div>
  </div>
</body>
</html>
