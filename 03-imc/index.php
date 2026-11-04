<?php
$erro = "";
$imcFormatado = "";
$classe = "";

$peso   = 70.0;   // kg
$altura = 1.75;   // metros

if ($peso <= 0 || $altura <= 0) {
    $erro = "Informe peso e altura maiores que zero.";
} else {
    $imc = $peso / ($altura * $altura);
    $imcFormatado = number_format($imc, 1, ",", ".");

    if ($imc < 18.5) {
        $classe = "Abaixo do peso";
    } elseif ($imc < 25) {
        $classe = "Peso normal";
    } elseif ($imc < 30) {
        $classe = "Sobrepeso";
    } elseif ($imc < 35) {
        $classe = "Obesidade grau I";
    } elseif ($imc < 40) {
        $classe = "Obesidade grau II";
    } else {
        $classe = "Obesidade grau III";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Calculadora de IMC</title>
</head>
<body>
  <h1>Calculadora de IMC</h1>
  <?php if ($erro): ?>
    <p><strong><?= $erro ?></strong></p>
  <?php else: ?>
    <p>Peso: <?= $peso ?> kg</p>
    <p>Altura: <?= $altura ?> m</p>
    <p>IMC: <strong><?= $imcFormatado ?></strong></p>
    <p>Classificação: <strong><?= $classe ?></strong></p>
  <?php endif; ?>
</body>
</html>