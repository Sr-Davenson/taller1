<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
</head>
<body>
    <h1>Ejercicio 1</h1>
    <p>Bienvenido! convierte tus palabras en sus respectivos acronimos <br> Puedes ingresar espacios o guiones para separar tus palabras 
    <br> Ej: As Soon As Possible  - ASAP<br>Liquid-crystal display- LCD<br>Thank George It's Friday! - TGIF</p>
    <form action="ejercicio1Resultado.php" method="post">
        <fieldset>
            <legend>Ingresa tus palabras aquí</legend>
            <input type="text" name="palabra" required>
            <button type="submit">Enviar</button>
        </fieldset>
    </form>
</body>
</html>