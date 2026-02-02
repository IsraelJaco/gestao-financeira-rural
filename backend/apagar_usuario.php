<?php
include "conexao.php";

$id = $_GET['id'];
$pdo->prepare("DELETE FROM usuarios WHERE id=?")->execute([$id]);

header("Location: ../front/usuarios.php");
exit;
