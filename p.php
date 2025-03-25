<?php class Nodo {
    public $valor;
    public $izquierda;
    public $derecha;

    public function __construct($valor) {
        $this->valor = $valor;
        $this->izquierda = null;
        $this->derecha = null;
    }
}

function construirArbolDesdePreInorden($preorden, $inorden) {
    if (empty($preorden) || empty($inorden)) {
        return null;
    }

    $raizValor = array_shift($preorden);
    $raiz = new Nodo($raizValor);
    $indiceRaiz = array_search($raizValor, $inorden);

    $inordenIzquierda = array_slice($inorden, 0, $indiceRaiz);
    $inordenDerecha = array_slice($inorden, $indiceRaiz + 1);
    $preordenIzquierda = array_slice($preorden, 0, count($inordenIzquierda));
    $preordenDerecha = array_slice($preorden, count($inordenIzquierda));

    $raiz->izquierda = construirArbolDesdePreInorden($preordenIzquierda, $inordenIzquierda);
    $raiz->derecha = construirArbolDesdePreInorden($preordenDerecha, $inordenDerecha);

    return $raiz;
}

function generarHTML($nodo) {
    if ($nodo === null) {
        return '';
    }

    $html = "<li>" . $nodo->valor;
    $html .= "<ul>";
    $html .= generarHTML($nodo->izquierda);
    $html .= generarHTML($nodo->derecha);
    $html .= "</ul></li>";

    return $html;
}

$error = "";
$htmlArbol = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $preorden = isset($_POST['preorden']) ? explode(',', trim($_POST['preorden'])) : [];
    $inorden = isset($_POST['inorden']) ? explode(',', trim($_POST['inorden'])) : [];

    if (count($preorden) > 0 && count($inorden) > 0) {
        $arbol = construirArbolDesdePreInorden($preorden, $inorden);
        $htmlArbol = "<ul>" . generarHTML($arbol) . "</ul>";
    } else {
        $error = "Debes ingresar al menos los recorridos preorden e inorden.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construcción del Árbol Binario</title>
    <style>
        ul {
            list-style-type: none;
            padding-left: 20px;
        }
        li {
            margin: 5px 0;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Construcción del Árbol Binario</h1>
    <form method="post" action="">
        <label for="preorden">Recorrido Preorden (separado por comas):</label><br>
        <input type="text" id="preorden" name="preorden" placeholder="Ejemplo: A,B,D,E,C,F"><br><br>
        
        <label for="inorden">Recorrido Inorden (separado por comas):</label><br>
        <input type="text" id="inorden" name="inorden" placeholder="Ejemplo: D,B,E,A,F,C"><br><br>
        
        <button type="submit">Construir Árbol</button>
    </form>
    
    <?php if (!empty($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if (!empty($htmlArbol)): ?>
        <h2>Árbol Binario Generado</h2>
        <?php echo $htmlArbol; ?>
    <?php endif; ?>
</body>
</html>