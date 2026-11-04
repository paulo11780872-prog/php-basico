
<?php
if (isset($_GET["peso"]) && isset($_GET["altura"])) {

    $peso = (float) $_GET["peso"];
    $altura = (float) $_GET["altura"];

    if ($peso > 0 && $altura > 0) {
        $imc = $peso / ($altura * $altura);

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

    <form method="GET">
        <p>Digite seu peso (kg):</p>
        <input type="number" name="peso" step="any" required>

        <p>Digite sua altura (m):</p>
        <input type="number" name="altura" step="any" required>

        <br><br>
        <button type="submit">Calcular IMC</button>
    </form>

    <?php
    if (isset($imc)) {
        echo "<h2>Resultado</h2>";
        echo "Seu IMC é: " . number_format($imc, 1, ",", ".");
        echo "<p>Classificação: $classe</p>";
    } elseif (isset($_GET["peso"])) {
        echo "<p>Digite valores maiores que zero.</p>";
    }
    ?>

</body>
</html>
