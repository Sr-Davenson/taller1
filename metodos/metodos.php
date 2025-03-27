<?php
class Metodos {

    function __construct(){
    }
    public function ejercicio1($palabra) {
        if (trim($palabra) === '') {
            return "<div class='info'><p>Error: La palabra ingresada está llena de espacios. Por favor, ingresa un texto válido.</p></div>";
        }

        if (is_numeric($palabra)) {
            return "<div class='info'><p>Error: Se ingresó un número ".$palabra." <br>Por favor, ingresa un texto válido.</p></div>";
        }

        $separarPalabra = preg_split('/[\s\-_]+/', $palabra);

        $acronimo = '';
        foreach ($separarPalabra as $palabraIndividual) {
            if (!empty($palabraIndividual)) {
                $acronimo .= strtoupper($palabraIndividual[0]);
            }
        }
        $mensaje = "<div class='info'>";
        $mensaje .= "<p>Palabra ingresada: " . $palabra . "</p>";
        $mensaje .= "<p>Acrónimo generado: " . $acronimo. "</p>";
        $mensaje .= "</div>";
        return $mensaje;

    }

    public function ejercicio5($numero) {

        if (!is_numeric($numero)) {
            return "<div class='info'><p>Error: Se no ingresó un número válido.</p></div>";
        }
        $binario = decbin($numero);

        $mensaje = "<div class='info'>";
        $mensaje .= "<p>Número ingresado: " . $numero . "</p>";
        $mensaje .= "<p>Binario generado: " . $binario. "</p>";
        $mensaje .= "</div>";
        return $mensaje;
    }
}
// Validar
Class Valide{
    //Validación de números
    public function validateNumber($number)
    {
        try {
            if (!is_numeric($number)) {
                throw new Exception("El valor ingresado no es un número.");
            }
            if ($number < 0) {
                throw new Exception("El número debe ser mayor o igual a 0.");
            }
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

//calculo estadistico

//Calculo para la serie de fibonacci
Class Operations{
    public function fibonacciSerie($n){
        try{
            if(!is_numeric($n) || $n < 0){
                throw new Exception("");
            }
            $serie = [];
            $a = 0;
            $b = 1;

            for($i= 0; $i<$n; $i++){
                $serie[] = $a;
                $aux = $a + $b;
                $a = $b;
                $b = $aux;
            }
            return $serie;
        } catch (Exception $e){
            return ["Error: " - $e->getMessage()];
        }
    }

    //Calculo para factorial
    public function factorialCalculation($n){
        try {
            if (!is_numeric($n) || $n < 0) {
                throw new Exception("");
            }

            if ($n == 0 || $n == 1) {
                return 1;
            }

            $aux = 1;
            for ($i = 2; $i <= $n; $i++) {
                $aux *= $i;
            }

            return $aux;
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}  

//Exercise6 - Arbol binario
?>