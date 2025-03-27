<?php
require_once 'arbolBinario.php';
require_once 'dibujarArbol.php';

$arbol = new ArbolBinario();
$dibujo = new DibujarArbol();

$resultadoDibujo = "";
$recorridoFaltante = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $preorder = !empty($_POST['preorder']) ? explode(",", $_POST['preorder']) : [];
    $inorder = !empty($_POST['inorder']) ? explode(",", $_POST['inorder']) : [];
    $postorder = !empty($_POST['postorder']) ? explode(",", $_POST['postorder']) : [];

    if (!empty($preorder) && !empty($inorder)) {
        $arbol->constructPreInorder($preorder, $inorder);
        $recorridoFaltante = "PostOrder: " . implode(", ", $arbol->generatePostOrder($arbol->getRaiz()));
    } elseif (!empty($postorder) && !empty($inorder)) {
        $arbol->constructPostInorder($postorder, $inorder);
        $recorridoFaltante = "PreOrder: " . implode(", ", $arbol->generatePreOrder($arbol->getRaiz()));
    } elseif (!empty($preorder) && !empty($postorder)) {
        // Calcular InOrder si PreOrder y PostOrder están disponibles
        $recorridoFaltante = "InOrder: " . implode(", ", $arbol->generateInOrder($arbol->getRaiz()));
    } else {
        $recorridoFaltante = "Error: Debes ingresar dos recorridos.";
    }

    $raiz = $arbol->getRaiz();
    $resultadoDibujo = $dibujo->dibujarVertical($raiz);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/p1.css">
    <title>Árbol Binario</title>
</head>
<body>
    <h1>Construcción de Árbol Binario</h1>

    <form method="POST">
        <label for="preorder">Recorrido PreOrder:</label>
        <input type="text" id="preorder" name="preorder" placeholder="A,B,C,D,E"><br><br>

        <label for="postorder">Recorrido PostOrder:</label>
        <input type="text" id="postorder" name="postorder" placeholder="E,D,C,B,A"><br><br>

        <label for="inorder">Recorrido InOrder:</label>
        <input type="text" id="inorder" name="inorder" placeholder="D,B,E,A,C"><br><br>

        <button type="submit">Construir Árbol</button>
    </form>

    <h2>Recorrido Faltante:</h2>
    <p><?php echo $recorridoFaltante; ?></p>

    <h2>Árbol Visual:</h2>
    <div><?php echo $resultadoDibujo; ?></div>
    <a href="../index.php">Ir a inicio</a>
</body>
</html>