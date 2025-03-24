<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles4.css">
    <title>Ejercicio 4</title>
</head>
<body>
    <div class="container">
        <h1>Operaciones con Conjuntos</h1>
        <form action="" method="post">
            <label for="setA">Conjunto A (separados por comas):</label>
            <input type="text" id="setA" name="setA" required>
            
            <label for="setB">Conjunto B (separados por comas):</label>
            <input type="text" id="setB" name="setB" required>
            
            <button type="submit">Calcular</button>
        </form>
    </div>

    <?php
    class Conjunto {
        private $valores;

        public function __construct($valores) {
        $this->valores = array_unique(array_map('intval', explode(',', $valores)));
        }

        public function getValores() {
        return $this->valores;
        }

        public function union(Conjunto $otro) {
        return array_unique(array_merge($this->valores, $otro->getValores()));
        }

        public function interseccion(Conjunto $otro) {
        return array_intersect($this->valores, $otro->getValores());
        }

        public function diferencia(Conjunto $otro) {
        return array_diff($this->valores, $otro->getValores());
        }
    }

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
     
</body>
</html>