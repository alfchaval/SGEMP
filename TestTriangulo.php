<?php
    include_once ("biblioteca.php");
    include_once ("TrianguloRectangulo.php");
    show_head("Triángulo con clase");

    $triangulo = new TrianguloRectangulo(3,4);
    echo "<p>El triángulo con catetos " . $triangulo->getCateto1() . " y " . $triangulo->getCateto2() . " tiene hipotenusa " . $triangulo->getHipotenusa() . "</p>";

    show_footer();
?>