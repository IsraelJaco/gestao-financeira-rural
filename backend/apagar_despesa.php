<?php
include "conexao.php";

$id = $_GET['id'];

if ($id) {
    $stmt = $pdo->prepare("DELETE FROM despesas WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: ../front/despesas.php");
exit;
