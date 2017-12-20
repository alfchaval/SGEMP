<?php
    print '
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <title>Curiosidades</title>
                <meta charset="utf-8"/>
            </head>
            <body>';
            $titulo='Curiosidades en los tipos';
            print '<h1>'.$titulo.'</h1>';
            $a = '12 manzanas';
            $b = '7 peras';
            echo '<p>La suma de manzanas y peras es: '.($a+$b).'</p>';
            $c = 'plátanos';
            $d = 'naranjas';
            echo '<p>La suma de plátanos y naranjas es: '.($c+$d).'</p>';
            //PHP lee los carácteres hasta que no lee cifras y ese es el valor que toma
    print '
            </body>
        </html>';
?>