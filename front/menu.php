<?php
// Detecta a página atual
$pagina_atual = basename($_SERVER['PHP_SELF']);
?>

<div class="menu-interno">
    <h1>Gestão Financeira Rural</h1>
    <div class="botoes-menu">
        <a href="dashboard.php" class="btn-menu <?= ($pagina_atual == 'dashboard.php') ? 'ativo' : '' ?>">Dashboard</a>
        <a href="receitas.php" class="btn-menu <?= ($pagina_atual == 'receitas.php') ? 'ativo' : '' ?>">Receitas</a>
        <a href="despesas.php" class="btn-menu <?= ($pagina_atual == 'despesas.php') ? 'ativo' : '' ?>">Despesas</a>
        <a href="investimentos.php" class="btn-menu <?= ($pagina_atual == 'investimentos.php') ? 'ativo' : '' ?>">Investimentos</a>
        <a href="relatorios.php" class="btn-menu <?= ($pagina_atual == 'relatorios.php') ? 'ativo' : '' ?>">Relatórios</a>
        <a href="../backend/logout.php" class="btn-menu btn-sair">Sair</a>
    </div>
</div>
