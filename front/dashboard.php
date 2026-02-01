<?php include __DIR__ . "/menu.php"; ?>
<?php
include __DIR__ . "/../backend/conexao.php";

// Puxar valores totais do banco
$receitas = $pdo->query("SELECT SUM(valor) FROM receitas")->fetchColumn();
$despesas = $pdo->query("SELECT SUM(valor) FROM despesas")->fetchColumn();
$investimentos = $pdo->query("SELECT SUM(valor) FROM investimentos")->fetchColumn();
$saldo = ($receitas ? $receitas : 0) - ($despesas ? $despesas : 0) - ($investimentos ? $investimentos : 0);

// Preparar dados para gráfico - últimos 6 meses
$meses = [];
$valores_receitas = [];
$valores_despesas = [];

for ($i = 5; $i >= 0; $i--) {
    $mes = date('Y-m', strtotime("-$i month"));
    $meses[] = date('M/Y', strtotime($mes));

    $v_rec = $pdo->query("SELECT SUM(valor) FROM receitas WHERE DATE_FORMAT(data,'%Y-%m') = '$mes'")->fetchColumn();
    $v_dep = $pdo->query("SELECT SUM(valor) FROM despesas WHERE DATE_FORMAT(data,'%Y-%m') = '$mes'")->fetchColumn();

    $valores_receitas[] = $v_rec ? $v_rec : 0;
    $valores_despesas[] = $v_dep ? $v_dep : 0;
}
?>
