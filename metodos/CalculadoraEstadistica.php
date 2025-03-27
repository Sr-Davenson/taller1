<?php class CalculadoraEstadistica
                {
                    private $numeros = [];

                    public function __construct($numeros)
                    {
                        $this->numeros = $numeros;
                    }

                    public function calcularPromedio()
                    {
                        $suma = array_sum($this->numeros);
                        $cantidad = count($this->numeros);
                        return $cantidad > 0 ? $suma / $cantidad : 0;
                    }

                    public function calcularMediana()
                    {
                        sort($this->numeros);
                        $cantidad = count($this->numeros);

                        if ($cantidad == 0) {
                            return 0;
                        }

                        $indiceMedio = floor($cantidad / 2);
                        if ($cantidad % 2 == 0) {
                            return ($this->numeros[$indiceMedio - 1] + $this->numeros[$indiceMedio]) / 2;
                        }

                        return $this->numeros[$indiceMedio];
                    }

                    public function calcularModa()
                    {
                        $this->numeros = array_map('intval', $this->numeros);
                        $frecuencias = array_count_values($this->numeros);
                        if (!empty($frecuencias)) {
                            $maxFrecuencia = max($frecuencias);
                            $moda = array_keys($frecuencias, $maxFrecuencia);
                            return implode(", ", $moda);
                        } else {
                            return "No se puede calcular la moda";
                        }
                    }
                }