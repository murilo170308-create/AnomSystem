<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <link rel="stylesheet" href="../css/styleTelaInicial.css">
</head>
<body>
    <!-- Barra lateral -->
    <div class="lateral">
        <img class="lateralimg" src="../img/logo.png" alt="Logo">
        <ol>
            <li><a href="anomalias.php">Anomalias</a></li>
            <li><a href="cadastro.php">Cadastro</a></li>
            <li><a href="relatorio.php">Relatorio</a></li>
        </ol>
    </div>

    <!-- Conteúdo principal -->
    <div class="conteudo">
        <div class="graficos">
            <img src="../img/Barra.png" alt="Gráfico de barras" class="barra">
            <img src="../img/Pizza.png" alt="Gráfico pizza e círculo" class="pizza">
        </div>

        <h1>Últimas Anomalias Registradas</h1>

        <table>
            <tr class="cabecalho">
                <th>ID - ANOMALIA</th>
                <th>Data de Registro</th>
                <th>Descrição Detalhada</th>
                <th>Responsável Designado</th>
            </tr>

            <tr>
                <td>02530</td>
                <td>23/03/2026</td>
                <td>Vazamento identificado na tubulação do setor de refrigeração.</td>
                <td>Equipe de manutenção hidráulica</td>
            </tr>

            <tr>
                <td>02531</td>
                <td>24/03/2026</td>
                <td>Falha intermitente do setor elétrico na ala de produção.</td>
                <td>Setor de engenharia elétrica</td>
            </tr>

            <tr>
                <td>02532</td>
                <td>25/03/2026</td>
                <td>Rachadura no vidro da janela principal do setor administrativo.</td>
                <td>Grupo de vidraceiros</td>
            </tr>
        </table>
    </div>
</body>
</html>
