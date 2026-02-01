<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit;
}

include "../backend/conexao.php";

// Totais
$totalReceitas = $pdo->query("SELECT IFNULL(SUM(valor),0) FROM receitas")->fetchColumn();
$totalDespesas = $pdo->query("SELECT IFNULL(SUM(valor),0) FROM despesas")->fetchColumn();
$totalInvestimentos = $pdo->query("SELECT IFNULL(SUM(valor),0) FROM investimentos")->fetchColumn();

$saldo = $totalReceitas - $totalDespesas - $totalInvestimentos;
?>

<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<title>Dashboard Financeiro</title>

<style>
body{
    font-family: Arial, sans-serif;
    background:#f4f6f8;
    margin:0;
    padding:20px;
}

h2{
    text-align:center;
    margin-bottom:30px;
}

.dashboard{
    display:grid;
    grid-template-columns: repeat(auto-fit, minmax(220px,1fr));
    gap:20px;
}

.card{
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 4px 8px rgba(0,0,0,0.1);
    text-align:center;
}

.card h3{
    margin-bottom:10px;
}

.card p{
    font-size:22px;
    font-weight:bold;
}

.receita{border-top:5px solid #2ecc71;}
.despesa{border-top:5px solid #e74c3c;}
.investimento{border-top:5px solid #f1c40f;}
.saldo{border-top:5px solid #3498db;}

.menu{
    background:#2c3e50;
    padding:10px;
    margin-bottom:30px;
    text-align:center;
}

.menu a{
    color:white;
    margin:0 10px;
    text-decoration:none;
    font-weight:bold;
}

.menu a:hover{
    text-decoration:underline;
}
</style>

</head>
<body>

<div class="menu">
    <a href="dashboard.php">Dashboard</a>
    <a href="receitas.php">Receitas</a>
    <a href="despesas.php">Despesas</a>
    <a href="investimentos.php">Investimentos</a>
    <a href="relatorios.php">Relatórios</a>
    <a href="../backend/logout.php">Sair</a>
</div>

<h2>📊 Dashboard Financeiro Rural</h2>

<div class="dashboard">
    <div class="card receita">
        <h3>Receitas</h3>
        <p>AOA <?= number_format($totalReceitas,2,",","."); ?></p>
    </div>

    <div class="card despesa">
        <h3>Despesas</h3>
        <p>AOA <?= number_format($totalDespesas,2,",","."); ?></p>
    </div>

    <div class="card investimento">
        <h3>Investimentos</h3>
        <p>AOA <?= number_format($totalInvestimentos,2,",","."); ?></p>
    </div>

    <div class="card saldo">
        <h3>Saldo Final</h3>
        <p>AOA <?= number_format($saldo,2,",","."); ?></p>
    </div>
</div>

</body>
</html>
