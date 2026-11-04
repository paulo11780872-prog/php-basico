<?php
$produtos = [
    ["nome" => "Teclado mecânico", "preco" => 249.90, "estoque" => 12],
    ["nome" => "Mouse sem fio", "preco" => 79.50, "estoque" => 30],
    ["nome" => "Monitor", "preco" => 899.90, "estoque" => 5],
    ["nome" => "Webcam", "preco" => 159.90, "estoque" => 0]
];

function formatarPreco(float $valor): string {
    return "R$ " . number_format($valor, 2, ",", ".");
}

$total = 0;

foreach ($produtos as $item) {
    $total += $item["preco"] * $item["estoque"];
}

$quantidade = count($produtos);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Produtos cadastrados</h1>

    <table border="1" cellpadding="6">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Situação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item["nome"]) ?></td>
                    <td><?= formatarPreco($item["preco"]) ?></td>
                    <td><?= $item["estoque"] ?></td>
                    <td>
                        <?= $item["estoque"] > 0 ? "Disponível" : "Esgotado" ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p><?= $quantidade ?> produtos cadastrados.</p>
    <p>Valor total em estoque: <?= formatarPreco($total) ?></p>
</body>
</html>