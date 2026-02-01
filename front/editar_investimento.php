<?php
include "../backend/conexao.php";

$id = $_GET['id'] ;

$stmt = $pdo->prepare("SELECT * FROM investimentos WHERE id = ?");
$stmt->execute([$id]);
$investimento = $stmt->fetch();

if (!$investimento) {
    echo "Investimento não encontrado!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Investimento</title>
</head>
<body>

<h2>Editar Investimento</h2>

<form action="../backend/atualizar_investimento.php" method="POST">
    <input type="hidden" name="id" value="<?= $investimento['id']; ?>">
    <input type="text" name="descricao" value="<?= $investimento['descricao']; ?>" required>
    <input type="number" name="valor" step="0.01" value="<?= $investimento['valor']; ?>" required>
    <input type="date" name="data" value="<?= $investimento['data']; ?>" required>
    <button type="submit">Atualizar</button>
</form>

</body>
</html>
