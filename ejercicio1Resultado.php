<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado Ejercicio 1</title>
    <link rel="stylesheet" href="s.css">
</head>
<body>
    <h1>Resultado Ejercicio!</h1>
    <div class="info">
<?php
    include "metodos.php";

    $palabra = $_POST['palabra'];
    $metodos = new Metodos();

    echo $metodos->ejercicio1($palabra);
?>
    </div>
    <div class="bot">
<a href="ejercicio1.php">Convertir otra palabra</a> <br>
</div>
<br>
<a href="index.php">Ir a inicio</a>
</body>
</html>