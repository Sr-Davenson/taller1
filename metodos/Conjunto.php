<?php
    class Conjunto {
        private $valores;
        
        public function __construct($valores) {
            $this->valores = array_unique(explode(',', $valores)); // Sin convertir a enteros
        }

        public function getValores() {
        return $this->valores;
        }

        public function union(Conjunto $otro) {
        return array_unique(array_merge($this->valores, $otro->getValores()));
        }

        public function interseccion(Conjunto $otro) {
        return array_intersect($this->valores, $otro->getValores());
        }

        public function diferencia(Conjunto $otro) {
        return array_diff($this->valores, $otro->getValores());
        }
    }