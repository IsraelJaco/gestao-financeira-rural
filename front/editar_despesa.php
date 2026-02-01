<?php
include "../backend/conexao.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM despesas WHERE id = ?");
$stmt->execute([$id]);
$despesa = $stmt->fetch();

if (!$despesa) {
    echo "Despesa não encontrada!";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Despesa</title>
</head>
<body>

<h2>Editar Despesa</h2>

<form action="../backend/atualizar_despesa.php" method="POST">
    <input type="hidden" name="id" value="<?= $despesa['id']; ?>">
    <input type="text" name="descricao" value="<?= $despesa['descricao']; ?>" required>
    <input type="number" name="valor" step="0.01" value="<?= $despesa['valor']; ?>" required>
    <input type="date" name="data" value="<?= $despesa['data']; ?>" required>
    <button type="submit">Atualizar</button>
</form>

</body>
</html>
