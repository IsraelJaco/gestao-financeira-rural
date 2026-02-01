<?php
include "conexao.php";

$id = $_GET['id'];

if ($id) {
    $stmt = $pdo->prepare("DELETE FROM investimentos WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: ../front/investimentos.php");
exit;
