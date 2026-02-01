<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Login - Gestão Financeira Rural</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<h2>Login do Sistema</h2>

<form action="../backend/login.php" method="POST">
    <input type="text" name="usuario" placeholder="Usuário" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Entrar</button>
</form>

</body>
</html>
