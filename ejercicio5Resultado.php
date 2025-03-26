<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado Ejercicio 5</title>
    <link rel="stylesheet" href="s.css">
</head>
<body>
<h1>Resultado Ejercicio!</h1>
<div class="info">
<?php
    include "metodos.php";

    $numero = $_POST['numero'] ?? '';
    $metodos = new Metodos();

    echo $metodos->ejercicio5($numero);
?>
</div>
<div class="bot">
<a href="ejercicio5.php">Convertir otro numero</a> <br>
</div>
<br>
<a href="index.php">Ir a inicio</a>
</body>
</html>