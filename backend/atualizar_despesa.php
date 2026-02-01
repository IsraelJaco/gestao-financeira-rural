<?php
include "conexao.php";

$id = $_POST['id'];
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$data = $_POST['data'];

$sql = "UPDATE despesas 
        SET descricao=?, valor=?, data=?
        WHERE id=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$descricao, $valor, $data, $id]);

header("Location: ../front/despesas.php");
exit;
