
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/s.css">
    <title>Ejercicio 3</title>
</head>
<body class="body">
    <h1 class="title">Calculadora Estadística</h1>
    <div class="info">
        <br>
        <form method="POST" action="" class="form">
            <legend>Ingresa tu número aquí:</legend>
                <input type="text" id="numeros" name="numeros" placeholder="Ejemplo: 1,2,3,4,5" required class="input">
            <button type="submit">Enviar</button>
        </form>
    <br>        
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $entrada = trim($_POST["numeros"]);
            if (empty($entrada)) {
                echo "<p class='error'>Error: No se ingresaron datos. Por favor, ingrese números separados por comas.</p>";
            } elseif (!preg_match('/^(\d+(\.\d+)?,?)+$/', $entrada)) {
                echo "<p class='error'>Error: Los datos ingresados son inválidos. Asegúrese de usar números separados por comas (por ejemplo: 1,2,3,4).</p>";
            } else {
        include "metodos/CalculadoraEstadistica.php";
        $numeros = $_POST['numeros'];
        $numeros = array_map('floatval', explode(",", $entrada));
        $calculadora = new CalculadoraEstadistica($numeros);
                echo "<div class='results'>";
                echo "<h2 class='results-title'>Resultados:</h2>";
                echo "<p class='result'><strong>Promedio:</strong> " .$calculadora->calcularPromedio(). "</p>";
                echo "<p class='result'><strong>Mediana:</strong> " . $calculadora->calcularMediana() . "</p>";
                echo "<p class='result'><strong>Moda:</strong> " .$calculadora->calcularModa(). "</p>";
                echo "</div>";
            }
        }
        ?>
    </div>
    <br>

<a href="index.php">Ir a inicio</a>
</body>
</html>
    