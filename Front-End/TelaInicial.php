<!-- HTML + CSS combinado para tela inicial estilo Arcelor Mittal -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial - AnomSystem</title>
    <link rel="stylesheet" href="../css/styleTelaInicial.css">
</head>
<body>

    

    <!-- BARRA LATERAL -->
    <div class="lateral">
        <img src="../img/logo.png" alt="Logo do Sistema">
        <ol>
            <li><a href="anomalias.php">Anomalias</a></li>
            <li><a href="cadastro.php">Cadastro</a></li>
            <li><a href="relatorio.php">Relatórios</a></li>
        </ol>
    </div>
    
    <!-- CONTEÚDO -->
    <div class="conteudo">

        <!-- BANNER TOP -->
        <div class="banner">Monitoramento de Anomalias Industriais</div>

        <!-- ÚLTIMAS ANOMALIAS (tipo "produtos em destaque") -->
        <div class="secao">
            <h2 class="titulo-secao">Últimas Anomalias Registradas</h2>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Descrição</th>
                    <th>Responsável</th>
                </tr>

                <tr>
                    <td>02530</td>
                    <td>23/03/2026</td>
                    <td>Vazamento detectado na tubulação do setor de refrigeração.</td>
                    <td>Equipe de manutenção hidráulica</td>
                </tr>

                <tr>
                    <td>02531</td>
                    <td>24/03/2026</td>
                    <td>Falha intermitente no setor elétrico da produção.</td>
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

        <!-- ÚLTIMAS ATUALIZAÇÕES (área estilo "notícias") -->
        <div class="secao">
            <h2 class="titulo-secao">Últimas Atualizações do Sistema</h2>

            <div class="cards">
                <div class="card" onclick="location.href='AtualizazaoCadastro.php'">
                    <h3>✔ Novo módulo de cadastro</h3>
                    <p>Adicionada área de cadastro otimizada para registrar equipamentos.</p>
                </div>
                <div class="card" onclick="location.href='AtualizacaoRelatorio.php'">
                    <h3>✔ Atualização na tela de relatórios</h3>
                    <p>Gráficos e filtros aprimorados para facilitar análises.</p>
                </div>
                <div class="card" onclick="location.href='AtualizacaoBugs.php'">
                    <h3>✔ Correção de bugs</h3>
                    <p>Melhorias gerais de desempenho e estabilidade do sistema.</p>
                </div>
            </div>
        </div>

        <!-- RODAPÉ -->
        <footer>
            © 2026 AnomSystem — Monitoramento e Gestão de Anomalias Industriais <br>
            Grupo: Arthur Barcelos, Arthur Benfica, João Vitor e Murilo Sabatini
        </footer>

    </div>
</body>
</html>
