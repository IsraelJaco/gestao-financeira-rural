<?php
include "../backend/conexao.php";

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id=?");
$stmt->execute([$id]);
$user = $stmt->fetch();
?>

<form action="../backend/atualizar_usuario.php" method="POST">
    <input type="hidden" name="id" value="<?= $user['id']; ?>">
    <input type="text" name="usuario" value="<?= $user['usuario']; ?>" required>
    <input type="password" name="senha" placeholder="Nova senha (opcional)">
    <button type="submit">Atualizar</button>
</form>
