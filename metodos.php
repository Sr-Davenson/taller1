<?php
class Metodos {

    function __construct(){
    }
    public function ejercicio1($palabra) {
        if (empty($palabra)) {
            return "No ingresaste ninguna palabra.";
        }

        if (is_numeric($palabra)) {
            return "Error: Se ingresó un número ".$palabra." Por favor, ingresa un texto válido.";
        }

        $separarPalabra = preg_split('/[\s-]+/', $palabra);

        $acronimo = '';
        foreach ($separarPalabra as $palabraIndividual) {
            if (!empty($palabraIndividual)) {
                $acronimo .= strtoupper($palabraIndividual[0]);
            }
        }

        $mensaje = "<p>Palabra ingresada: " . $palabra . "</p>";
        $mensaje .= "<p>Acrónimo generado: " . $acronimo. "</p>";
        return $mensaje;
    }

    public function ejercicio5($numero) {

        if (!is_numeric($numero)) {
            return "Error: Se no ingresó un número válido.";
        }
        $binario = decbin($numero);


        $mensaje = "<p>Número ingresado: " . $numero . "</p>";
        $mensaje .= "<p>Binario generado: " . $binario. "</p>";
        return $mensaje;
    }
}
?>