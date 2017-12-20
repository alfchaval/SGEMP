<?php
    class Triangulo {
        private $lados;

        /**
         * Constructor de la clase
         */
        public function __construct($lado1, $lado2, $lado3) {
            $this->lados = array($lado1, $lado2, $lado3);
        }

        /**
         * Destructor de la clase
         */
        public function __destruct() {
            $this->lados = null;
        }

        public function getLados() {
            return $this->lados;
        }

        function hipotenusa($c1, $c2) {
            return sqrt(pow($c1,2) + pow($c2,2));
        }
    }
?>