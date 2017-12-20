<?php
    include "biblioteca.php";
    show_head("Hipotenusa de un triángulo");
    $cateto1 = $_POST["cateto1"];
    $cateto2 = $_POST["cateto2"];
    function hipotenusa($c1, $c2) {
        return sqrt(pow($c1,2) + pow($c2,2));
    }
    if(!empty($cateto1) && !empty($cateto2)) {
        echo 'La hipotenusa del triángulo con catetos '.$cateto1.' y '.$cateto2.' es: '.hipotenusa($cateto1, $cateto2);
    }
    else {
        echo 'Debes introducir un valor en los catetos';
    }
    
    show_footer();
?>