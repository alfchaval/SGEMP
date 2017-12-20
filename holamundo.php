<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Hola Mundo</title>
        <meta charset="utf-8"/>
    </head>
    <!--
        Comentario de HTML
    -->
    <body>
        <?php
        $saludo = "Hola mundo";
        $pregunta = "¿Cómo estás?";
            //Comentario de PHP
            /**
             * Ejemplo en el que se muestra que las comillas dobles interpretan las variables, mientras que las comillas simples no.
             */
            echo "<p>$saludo</p>";
            echo "<p>".$saludo."</p>";
            echo '<p>$saludo</p>';
            echo '<p>'.$saludo.'</p>';
        ?>
    </body>
</html>