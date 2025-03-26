
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Ejercicio 3</title>
</head>
<body class="body">
    <div class="container">
        <h1 class="title">Calculadora Estadística</h1>
        <form method="POST" action="" class="form">
            <div class="form-group">
                <label for="numeros" class="label">Ingrese números separados por comas:</label>
                <input type="text" id="numeros" name="numeros" placeholder="Ejemplo: 1,2,3,4,5" required class="input">
            </div>
            <button type="submit" class="btn">Calcular</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $entrada = trim($_POST["numeros"]);
            if (empty($entrada)) {
                echo "<p class='error'>Error: No se ingresaron datos. Por favor, ingrese números separados por comas.</p>";
            } elseif (!preg_match('/^(\d+(\.\d+)?,?)+$/', $entrada)) {
                echo "<p class='error'>Error: Los datos ingresados son inválidos. Asegúrese de usar números separados por comas (por ejemplo: 1,2,3,4).</p>";
            } else {
                class CalculadoraEstadistica
                {
                    private $numeros = [];

                    public function __construct($numeros)
                    {
                        $this->numeros = $numeros;
                    }

                    public function calcularPromedio()
                    {
                        $suma = array_sum($this->numeros);
                        $cantidad = count($this->numeros);
                        return $cantidad > 0 ? $suma / $cantidad : 0;
                    }

                    public function calcularMediana()
                    {
                        sort($this->numeros);
                        $cantidad = count($this->numeros);

                        if ($cantidad == 0) {
                            return 0;
                        }

                        $indiceMedio = floor($cantidad / 2);
                        if ($cantidad % 2 == 0) {
                            return ($this->numeros[$indiceMedio - 1] + $this->numeros[$indiceMedio]) / 2;
                        }

                        return $this->numeros[$indiceMedio];
                    }

                    public function calcularModa()
                    {
                        $this->numeros = array_map('intval', $this->numeros);
                        $frecuencias = array_count_values($this->numeros);
                        if (!empty($frecuencias)) {
                            $maxFrecuencia = max($frecuencias);
                            $moda = array_keys($frecuencias, $maxFrecuencia);
                            return implode(", ", $moda);
                        } else {
                            return "No se puede calcular la moda";
                        }
                    }
                }
                $numeros = array_map('floatval', explode(",", $entrada));
                $calculadora = new CalculadoraEstadistica($numeros);
                echo "<div class='results'>";
                echo "<h2 class='results-title'>Resultados</h2>";
                echo "<p class='result'><strong>Promedio:</strong> " . $calculadora->calcularPromedio() . "</p>";
                echo "<p class='result'><strong>Mediana:</strong> " . $calculadora->calcularMediana() . "</p>";
                echo "<p class='result'><strong>Moda:</strong> " . $calculadora->calcularModa() . "</p>";
                echo "</div>";
            }
        }
        ?>
        <a href="index.php">Ir a inicio</a>
    </div>
</body>
</html>
    