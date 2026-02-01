<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit;
}

include "../backend/conexao.php";

// Buscar receitas
$receitas = $pdo->query("SELECT * FROM receitas ORDER BY data DESC");
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Receitas</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<h2>Registo de Receitas</h2>

<?php if (isset($_GET['sucesso'])): ?>
    <p style="color:green;">Receita salva com sucesso!</p>
<?php endif; ?>

<form action="../backend/salvar_receita.php" method="POST">
    <input type="text" name="descricao" placeholder="Descrição" required>
    <input type="number" name="valor" step="0.01" placeholder="Valor" required>
    <input type="date" name="data" required>
    <button type="submit">Salvar</button>
</form>

<hr>

<h3>Lista de Receitas</h3>

<table border="1" width="100%">
<tr>
    <th>Descrição</th>
    <th>Valor</th>
    <th>Data</th>
    <th>Ações</th>
</tr>

<?php while ($r = $receitas->fetch(PDO::FETCH_ASSOC)): ?>
<tr>
    <td><?= $r['descricao']; ?></td>
    <td>AOA <?= number_format($r['valor'],2,",","."); ?></td>
    <td><?= date("d/m/Y", strtotime($r['data'])); ?></td>
    <td>
        <a href="editar_receita.php?id=<?= $r['id']; ?>">Editar</a> |
        <a href="../backend/apagar_receita.php?= $r['id']; ?>" 
           onclick="return confirm('Deseja apagar?')">Apagar</a>
    </td>
</tr>
<?php endwhile; ?>

</table>

</body>
</html>
