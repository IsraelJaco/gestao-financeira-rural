<?php
session_start();
include "conexao.php";

$usuario = $_POST['usuario'];
$senha   = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$usuario]);

$user = $stmt->fetch();

if ($user && password_verify($senha, $user['senha'])) {
    $_SESSION['usuario'] = $user['usuario'];
    header("Location: ../front/dashboard.php");
} else {
    echo "Usuário ou senha incorretos!";
}
