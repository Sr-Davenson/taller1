<?php
require_once 'metodos.php';

$operaciones = new Operations();
$validar = new Valide();

$resultado = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $numero = $_POST['numero'];
    $operacion = $_POST['operacion'];

    // Validar
    $validacion = $validar->validateNumber($numero);
    if ($validacion === true) {
        if ($operacion === "fibonacci") {
            $resultadoArray = $operaciones->fibonacciSerie($numero);
            $resultado = is_array($resultadoArray) ? implode(", ", $resultadoArray) : $resultadoArray;
        } elseif ($operacion === "factorial") {
            $resultado = $operaciones->factorialCalculation($numero);
        }
    } else {
        $error = $validacion; // Mensaje de error proporcionado por el Validador
    }
}
?>
