<?php
    print '
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <title>Hola Mundo</title>
                <meta charset="utf-8"/>
            </head>
            <!--
                Comentario de HTML
            -->
            <body>';
            $titulo="Información de la variable super global";
            echo '<pre>'.print_r($_SERVER, true).'<pre>';
    print '
            </body>
        </html>';
?>