<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<body>
    <h1>Ejercicio 1</h1>
    <div class="info">
    <p>Bienvenido! convierte tus palabras en sus respectivos acronimos <br> Puedes ingresar espacios o guiones para separar tus palabras </p>
    <ul>Ej:</ul>
    <ul>- As Soon As Possible -> ASAP </ul>
    <ul>- Liquid-crystal display -> LCD </ul>
    <ul>- Thank George It's Friday! -> TGIF</ul> 
    <br>
        <form action="ejercicio1Resultado.php" method="post">
                <legend>Ingresa tus palabras aquí:</legend>
                <input type="text" name="palabra" placeholder="Ingresa tu palabra" required>
                <button type="submit">Enviar</button>
        </form>
    </div>
    <br>
    <a href="index.php">Ir a inicio</a>
</body>
</html>