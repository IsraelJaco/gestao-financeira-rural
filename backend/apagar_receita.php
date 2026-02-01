<?php
include "conexao.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM receitas WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: ../front/receitas.php");
