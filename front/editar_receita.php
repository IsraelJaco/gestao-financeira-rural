<?php
include "../backend/conexao.php";

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM receitas WHERE id = ?");
$stmt->execute([$id]);
$receita = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Receita</title>
</head>
<body>

<h2>Editar Receita</h2>

<form action="../backend/atualizar_receita.php" method="POST">
    <input type="hidden" name="id" value="<?= $receita['id']; ?>">
    <input type="text" name="descricao" value="<?= $receita['descricao']; ?>" required>
    <input type="number" name="valor" step="0.01" value="<?= $receita['valor']; ?>" required>
    <input type="date" name="data" value="<?= $receita['data']; ?>" required>
    <button type="submit">Atualizar</button>
</form>

</body>
</html>
