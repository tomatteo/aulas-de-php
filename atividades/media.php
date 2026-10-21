<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Média</title>
</head>
<body>

    <h1>Calculadora de Média</h1>

    <form method="POST">
        <label>Nota 1:</label>
        <input type="number" name="nota1" step="0.1" required>

        <br><br>

        <label>Nota 2:</label>
        <input type="number" name="nota2" step="0.1" required>

        <br><br>

        <button type="submit">Calcular Média</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nota1 = $_POST["nota1"];
        $nota2 = $_POST["nota2"];

        $media = ($nota1 + $nota2) / 2;

        echo "<h2>Média: $media</h2>";

        if ($media >= 7) {
            echo "Situação: Aprovado";
        } elseif ($media >= 5) {
            echo "Situação: Recuperação";
        } else {
            echo "Situação: Reprovado";
        }
    }
    ?>

</body>
</html>