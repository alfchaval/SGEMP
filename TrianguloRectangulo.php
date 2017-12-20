<?php
    include_once ("Triangulo.php");

    class TrianguloRectangulo extends Triangulo {

        function __construct($cateto1, $cateto2) {
            parent :: __construct($cateto1, $cateto2, parent::hipotenusa($cateto1, $cateto2));
        }

        public function getCateto1() {
            return parent :: getLados()[0];
        }

        public function getCateto2() {
            return parent :: getLados()[1];
        }

        public function getHipotenusa() {
            return parent :: getLados()[2];
        }
    };
?>