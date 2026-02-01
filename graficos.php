<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashi.css">
</head>
<body>

<?php include __DIR__ . "/menu.php"; ?>

<div class="conteudo">
    <h2>Dashboard Financeiro</h2>

    <div class="cards">
        <div class="card receita">
            <h3>Receitas</h3>
            <p>AOA <?= number_format($receitas,2,",",".") ?></p>
            <a href="receitas.php">Acessar</a>
        </div>

        <div class="card despesa">
            <h3>Despesas</h3>
            <p>AOA <?= number_format($despesas,2,",",".") ?></p>
            <a href="despesas.php">Acessar</a>
        </div>

        <div class="card investimento">
            <h3>Investimentos</h3>
            <p>AOA <?= number_format($investimentos,2,",",".") ?></p>
            <a href="investimentos.php">Acessar</a>
        </div>

        <div class="card saldo">
            <h3>Saldo</h3>
            <p>AOA <?= number_format($saldo,2,",",".") ?></p>
            <a href="receitas.php">Detalhes</a>
        </div>
    </div>

    <h3>Fluxo de Caixa - Últimos 6 meses</h3>
    <canvas id="graficoFluxo"></canvas>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('graficoFluxo').getContext('2d');
const grafico = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= json_encode($meses) ?>,
        datasets: [
            {
                label: 'Receitas',
                data: <?= json_encode($valores_receitas) ?>,
                borderColor: '#2e7d32',
                backgroundColor: 'rgba(46,125,50,0.2)',
                fill: true,
                tension: 0.3
            },
            {
                label: 'Despesas',
                data: <?= json_encode($valores_despesas) ?>,
                borderColor: '#c62828',
                backgroundColor: 'rgba(198,40,40,0.2)',
                fill: true,
                tension: 0.3
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' },
            title: { display: true, text: 'Fluxo de Caixa Mensal' }
        }
    }
});
</script>

</body>
</html>
