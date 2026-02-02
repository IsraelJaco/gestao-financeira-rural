<?php
include "conexao.php";

$usuario = $_POST['usuario'];
$senha   = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (usuario, senha) VALUES (?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$usuario, $senha]);

header("Location: ../front/usuarios.php");
exit;
