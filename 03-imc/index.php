<?php
$erro = "";
$imcFormatado = "";
$classe = "";

$peso   = (float) str_replace(",", ".", $_GET["peso"] ?? "0");
$altura = (float) str_replace(",", ".", $_GET["altura"] ?? "0");
$enviado = isset($_GET["peso"]) || isset($_GET["altura"]);

if ($enviado) {
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

  <form method="get">
    <label>Peso (kg):
      <input type="text" name="peso" value="<?= htmlspecialchars($_GET["peso"] ?? "") ?>">
    </label>
    <label>Altura (m):
      <input type="text" name="altura" value="<?= htmlspecialchars($_GET["altura"] ?? "") ?>">
    </label>
    <button type="submit">Calcular</button>
  </form>

  <?php if ($erro): ?>
    <p><strong><?= $erro ?></strong></p>
  <?php elseif ($enviado): ?>
    <p>IMC: <strong><?= $imcFormatado ?></strong></p>
    <p>Classificação: <strong><?= $classe ?></strong></p>
  <?php endif; ?>
</body>
</html>