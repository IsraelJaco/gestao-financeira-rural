<?php
include "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $descricao = trim($_POST['descricao']);
    $valor = trim($_POST['valor']);
    $data = trim($_POST['data']);

    if ($descricao && $valor > 0 && $data) {

        $sql = "INSERT INTO investimentos (descricao, valor, data)
                VALUES (:descricao, :valor, :data)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':descricao' => $descricao,
            ':valor' => $valor,
            ':data' => $data
        ]);

        header("Location: ../front/investimentos.php?sucesso=1");
        exit;
    }
}

echo "Erro ao salvar investimento.";
