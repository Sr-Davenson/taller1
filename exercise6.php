<?php
require_once 'arbolBinario.php';
require_once 'dibujarArbol.php';

$arbol = new ArbolBinario();
$dibujo = new DibujarArbol();
$resultado = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $preorder = !empty($_POST['preorder']) ? array_map('trim', explode(",", $_POST['preorder'])) : [];
    $inorder = !empty($_POST['inorder']) ? array_map('trim', explode(",", $_POST['inorder'])) : [];
    $postorder = !empty($_POST['postorder']) ? array_map('trim', explode(",", $_POST['postorder'])) : [];

    if (!empty($preorder) && !empty($inorder)) {
        $arbol->constructPreInorder($preorder, $inorder);
    } elseif (!empty($postorder) && !empty($inorder)) {
        $arbol->constructPostInorder($postorder, $inorder);
    } else {
        $resultado = "Error: Debes ingresar al menos dos recorridos, incluyendo el InOrder.";
    }

    $raiz = $arbol->getRaiz();
    if ($raiz === null) {
        $resultado = "Error: No se pudo construir el árbol. Revisa los recorridos ingresados.";
    } else {
        $resultado = $dibujo->dibujar($raiz);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
    <link rel="stylesheet" href="styleArbolBinario.css">
</head>
<body>
    <h1>Árbol binario y sus recorridos</h1>
    <form method="POST" action="">
        <label for="preorder">Recorrido PreOrder:</label>
        <input type="text" id="preorder" name="preorder" placeholder="A,B,C,D,E"><br><br>

        <label for="postorder">Recorrido PostOrder:</label>
        <input type="text" id="postorder" name="postorder" placeholder="E,D,C,B,A"><br><br>

        <label for="inorder">Recorrido InOrder:</label>
        <input type="text" id="inorder" name="inorder" placeholder="D,B,E,A,C" required><br><br>

        <button type="submit">Recorridos</button>
    </form>
    <h2>Resultado:</h2>
    <div id="arbol">
        <?php echo $resultado; ?>
    </div>
    <a href="index.php">Ir a inicio</a>
</body>
</html>
