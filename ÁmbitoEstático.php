<?php
    print '
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <title>Ámbito Estático</title>
                <meta charset="utf-8"/>
            </head>
            <body>';
            /**
             * Una variable stática se inicializa en la primera llamada de la función pero el
             * valor de la variable no se pierde. Se utiliza en funciones recursivas.
             */
            function contador_visitas() {
                static $visitas = 0;
                static $visitas = 1+2; //Es correcto en PHP 5.6 y posteriores.
                //static $visitas = sqrt(121); //No se puede inicializar una constante con el resultado de una función
                echo '<p>Se ha visitado la página '.$visitas.' veces';
                $visitas++;
            }
            $titulo = "Ámbito Estático";
            print "<h1>$titulo</h1>";
            contador_visitas();
            contador_visitas();
            contador_visitas();
    print '
            </body>
        </html>';
?>