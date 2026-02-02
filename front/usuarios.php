<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit;
}

include "../backend/conexao.php";
$usuarios = $pdo->query("SELECT * FROM usuarios ORDER BY usuario");
?>

<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<title>Gestão de Usuários</title>
</head>
<body>

<h2>Gestão de Usuários</h2>

<form action="../backend/salvar_usuario.php" method="POST">
    <input type="text" name="usuario" placeholder="Usuário" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Salvar</button>
</form>

<hr>

<table border="1" width="50%">
<tr>
    <th>Usuário</th>
    <th>Ações</th>
</tr>

<?php while($u = $usuarios->fetch(PDO::FETCH_ASSOC)): ?>
<tr>
    <td><?= htmlspecialchars($u['usuario']); ?></td>
    <td>
        <a href="editar_usuario.php?id=<?= $u['id']; ?>">Editar</a> |
        <a href="../backend/apagar_usuario.php?id=<?= $u['id']; ?>"
           onclick="return confirm('Apagar usuário?')">Apagar</a>
    </td>
</tr>
<?php endwhile; ?>
</table>

</body>
</html>
