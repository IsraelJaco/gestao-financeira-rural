<?php
include "conexao.php";

$id = $_POST['id'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

if ($senha != "") {
    $senha = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "UPDATE usuarios SET usuario=?, senha=? WHERE id=?";
    $pdo->prepare($sql)->execute([$usuario, $senha, $id]);
} else {
    $sql = "UPDATE usuarios SET usuario=? WHERE id=?";
    $pdo->prepare($sql)->execute([$usuario, $id]);
}

header("Location: ../front/usuarios.php");
exit;
