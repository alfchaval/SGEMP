<?php
    include_once ("biblioteca.php");
    include_once ("Persona.php");
    include_once ("Estudiante.php");
    show_head("Mi primera clase en PHP");
    //Se crea el objeto persona
    $persona = new Persona("Alfonso", "Chamorro", "25");
    $modulos = array("DEINT", "SGEMP", "EINE", "PSPRO", "PMOV");
    $estudiante = new Estudiante("Bruce", "Wayne", "40", 3456, $modulos);
    $estudiante->setCodigo(1357);
    echo '<p>' . $persona->saludar() . '</p>';
    echo '<p>' . $estudiante->saludar() . '</p>';
    $array_personas = array();
    $array_personas[0] = $persona;
    $array_personas[1] = $estudiante;

    for($i = 0; $i < count($array_personas); $i++) {
        if($array_personas[$i] instanceof Estudiante) {
            echo "<h1>ESTUDIANTE</h1>";
            echo "<p>Nombre: " . $array_personas[$i]->getNombre() . "</p>";
            echo "<p>Apellido: " . $array_personas[$i]->getApellido() . "</p>";
            echo "<p>Edad: " . $array_personas[$i]->getEdad() . "</p>";
            echo "<p>Código: " . $array_personas[$i]->getCodigo() . "</p>";
            //El uso de métodos y propiedades estáticas se usa mediante el nombre de la clase
            echo "<p>Número de módulos: " . Estudiante::$numModulos . "</p>";
            echo "<p>Matrícula: " . print_r($array_personas[$i]->getMatricula(), false) . "</p>";
        }
        else if($array_personas[$i] instanceof Persona) {
            echo "<h1>PERSONA</h1>";
            echo "<p>Nombre: " . $array_personas[$i]->getNombre() . "</p>";
            echo "<p>Apellido: " . $array_personas[$i]->getApellido() . "</p>";
            echo "<p>Edad: " . $array_personas[$i]->getEdad() . "</p>";
        }
    }
    //Se destruye el objeto persona
    unset($persona);
    show_footer();
?>