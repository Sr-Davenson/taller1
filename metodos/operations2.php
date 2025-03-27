<?php
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
