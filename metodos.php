<?php
class Metodos {

    function __construct(){
    }
    public function ejercicio1($palabra) {
        if (empty($palabra)) {
            return "No ingresaste ninguna palabra.";
        }

        if (is_numeric($palabra)) {
            return "Error: Se ingresó un número. Por favor, ingresa un texto válido.";
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
}
?>