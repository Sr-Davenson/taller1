<?php
class Metodos {

    function __construct(){
    }

    public function ejercicio1($palabra) {
        if (empty($palabra)) {
            return "No ingresaste ninguna palabra.";
        }

        $separarPalabra = preg_split('/[\s-]+/', $palabra);

        $acronimo = '';
        foreach ($separarPalabra as $palabraIndividual) {
            $acronimo .= strtoupper($palabraIndividual[0]);
        }

        $mensaje = "<p>Palabra ingresada: " . htmlspecialchars($palabra) . "</p>";
        $mensaje .= "<p>Acrónimo generado: " . htmlspecialchars($acronimo) . "</p>";
        return $mensaje;
    }

}

