<?php
include "conexao.php";

$usuario = "jaco";
$senha   = password_hash("1234", PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (usuario, senha) VALUES (?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$usuario, $senha]);

echo "Usuário criado com sucesso!";
