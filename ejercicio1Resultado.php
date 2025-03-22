<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado Ejercicio 1</title>
</head>
<body>
<?php
    include "metodos.php";

    $palabra = $_POST['palabra'] ?? '';
    $metodos = new Metodos();

    echo $metodos->ejercicio1($palabra);
?>
</body>
</html>