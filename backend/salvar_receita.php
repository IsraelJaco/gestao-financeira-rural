<?php
include __DIR__ . "/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $descricao = isset($_POST['descricao']) ? trim($_POST['descricao']) : '';
    $valor     = isset($_POST['valor']) ? trim($_POST['valor']) : '';
    $data      = isset($_POST['data']) ? trim($_POST['data']) : '';

    if ($descricao != "" && $valor > 0 && $data != "") {

        $sql = "INSERT INTO receitas (descricao, valor, data, criado_em)
                VALUES (:descricao, :valor, :data, NOW())";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':data', $data);

        if ($stmt->execute()) {
            header("Location: ../front/receitas.php?sucesso=1");
            exit;
        } else {
            echo "Erro ao salvar receita.";
        }

    } else {
        echo "Preencha todos os campos corretamente.";
    }
}
