<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit;
}

include "../backend/conexao.php";

$despesas = $pdo->query("SELECT * FROM despesas ORDER BY data DESC");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Despesas</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<h2>Registo de Despesas</h2>

<?php if (isset($_GET['sucesso'])): ?>
    <p style="color:green;">Despesa salva com sucesso!</p>
<?php endif; ?>

<form action="../backend/salvar_despesa.php" method="POST">
    <input type="text" name="descricao" placeholder="Descrição" required>
    <input type="number" name="valor" step="0.01" placeholder="Valor" required>
    <input type="date" name="data" required>
    <button type="submit">Salvar</button>
</form>

<hr>

<h3>Lista de Despesas</h3>

<table border="1" width="100%">
<tr>
    <th>Descrição</th>
    <th>Valor</th>
    <th>Data</th>
    <th>Ações</th>
</tr>

<?php while ($d = $despesas->fetch(PDO::FETCH_ASSOC)): ?>
<tr>
    <td><?= htmlspecialchars($d['descricao']); ?></td>
    <td>AOA <?= number_format($d['valor'],2,",","."); ?></td>
    <td><?= date("d/m/Y", strtotime($d['data'])); ?></td>
    <td>
        <a href="editar_despesa.php?id=<?= $d['id']; ?>">Editar</a> |
        <a href="../backend/apagar_despesa.php?id=<?= $d['id']; ?>"
           onclick="return confirm('Deseja apagar esta despesa?')">
           Apagar
        </a>
    </td>
</tr>
<?php endwhile; ?>
</table>

</body>
</html>
