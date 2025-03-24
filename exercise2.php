<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Calculadora de Fibonacci y Factorial</h1>

    <form method="POST" action="">
        <label for="numero">Ingrese un número:</label>
        <input type="number" id="numero" name="numero" required><br><br>

        <label for="operacion">Seleccione la operación:</label><br>
        <input type="radio" id="fibonacci" name="operacion" value="fibonacci" required>
        <label for="fibonacci">Fibonacci</label><br>
        <input type="radio" id="factorial" name="operacion" value="factorial" required>
        <label for="factorial">Factorial</label><br><br>
        <button type="submit">Calcular</button>
    </form>

    <!--Mensajes de error o resultados -->
    <?php if ($error): ?>
        <div style="color: red; font-weight: bold;">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php elseif ($resultado): ?>
        <h2>Resultado:</h2>
        <p><?php echo htmlspecialchars($resultado); ?></p>
    <?php endif; ?>
    <a href="index.php">Volver</a>
</body>
</html>

