<?php
    class Persona {
        private $nombre;
        private $apellido;
        private $edad;

        /**
         * Constructor de la clase
         */
        public function __construct($nombre, $apellido, $edad) {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->edad = $edad;
        }

        /**
         * Destructor de la clase
         */
        public function __destruct() {
            print "Objeto destruido";
        }

        public function saludar() {
            return "Hola, soy " . $this->nombre . " " . $this->apellido . " y tengo " . $this->edad . " años";
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getApellido() {
            return $this->apellido;
        }

        public function getEdad() {
            return $this->edad;
        }
    }
?>