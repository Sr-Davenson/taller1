<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado Ejercicio 5</title>
</head>
<body>
<?php
    include "metodos.php";

    $numero = $_POST['numero'] ?? '';
    $metodos = new Metodos();

    echo $metodos->ejercicio5($palabra);
?>
<a href="ejercicio1.php">Convertir otro numero</a> <br>
<a href="index.php">Ir a inicio</a>
</body>
</html>