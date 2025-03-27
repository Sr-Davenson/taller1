<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/s.css">
    <title>Ejercicio 4</title>
</head>
<body>
<h1>Operaciones con Conjuntos</h1>
    <div class="info">
    <br>
        <form action="" method="post">
            <label for="setA">Conjunto A (separados por comas):</label>
            <input type="text" id="setA" name="setA"  placeholder="Ej: a,b,c,d" required>
            <br>
            <label for="setB">Conjunto B (separados por comas):</label>
            <input type="text" id="setB" name="setB"  placeholder="Ej: a,b,c,d" required>
            <button type="submit">Calcular</button>
        </form>

   <?php
   include "metodos/Conjunto.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $setA = filter_var($_POST['setA'], FILTER_SANITIZE_STRING);
    $setB = filter_var($_POST['setB'], FILTER_SANITIZE_STRING);

    if (!empty($setA) && !empty($setB)) {
        $conjuntoA = new Conjunto($setA);
        $conjuntoB = new Conjunto($setB);

        echo "<div class='container'>";
        echo "<h2>Resultados</h2>";
        echo "<p><strong>Unión:</strong> " . implode(", ", $conjuntoA->union($conjuntoB)) . "</p>";
        echo "<p><strong>Intersección:</strong> " . implode(", ", $conjuntoA->interseccion($conjuntoB)) . "</p>";
        echo "<p><strong>Diferencia A-B:</strong> " . implode(", ", $conjuntoA->diferencia($conjuntoB)) . "</p>";
        echo "<p><strong>Diferencia B-A:</strong> " . implode(", ", $conjuntoB->diferencia($conjuntoA)) . "</p>";
        echo "</div>";
    } else {
        echo "<div class='container'><p>Por favor, ingrese ambos conjuntos correctamente.</p></div>";
    }
}
?>
    </div>
    <br>
    <a href="index.php">Ir a inicio</a>
</body>
</html>