<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit;
}

include "../backend/conexao.php";

$investimentos = $pdo->query("SELECT * FROM investimentos ORDER BY data DESC");
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Investimentos</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<h2>Registo de Investimentos</h2>

<?php if (isset($_GET['sucesso'])): ?>
    <p style="color:green;">Investimento registado com sucesso!</p>
<?php endif; ?>

<form action="../backend/salvar_investimento.php" method="POST">
    <input type="text" name="descricao" placeholder="Descrição" required>
    <input type="number" name="valor" step="0.01" placeholder="Valor" required>
    <input type="date" name="data" required>
    <button type="submit">Salvar</button>
</form>

<hr>

<h3>Lista de Investimentos</h3>

<table border="1" width="100%">
<tr>
    <th>Descrição</th>
    <th>Valor</th>
    <th>Data</th>
    <th>Ações</th>
</tr>

<?php while ($i = $investimentos->fetch(PDO::FETCH_ASSOC)): ?>
<tr>
    <td><?= htmlspecialchars($i['descricao']); ?></td>
    <td>AOA <?= number_format($i['valor'],2,",","."); ?></td>
    <td><?= date("d/m/Y", strtotime($i['data'])); ?></td>
    <td>
        <a href="editar_investimento.php?id=<?= $i['id']; ?>">Editar</a> |
        <a href="../backend/apagar_investimento.php?id=<?= $i['id']; ?>"
           onclick="return confirm('Deseja apagar este investimento?')">
           Apagar
        </a>
    </td>
</tr>
<?php endwhile; ?>
</table>

</body>
</html>
