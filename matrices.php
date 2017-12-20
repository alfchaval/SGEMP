<?php
    print '
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <title>Hola Mundo</title>
                <meta charset="utf-8"/>
            </head>
            <body>';
            $titulo = "Ejemplo matrices";
            print "<h1>$titulo</h1>";
            //Las matrices no son tipadas y pueden tener diferentes tipos
            $nacimientos = ["Santiago", "Ramón y Cajal", 1852];
            echo '<p>'.$nacimientos[0].' '.$nacimientos[1].' nació en el año '.$nacimientos[2].'</p>';
            //Las matrices pueden ser multidimensionales y asocitivas
            $informacion=[
                ["nombre"=>"Santiago","apellido"=>"Ramón y Cajal","anno"=>1852],
                ["nombre"=>"Juan","apellido"=>"Casals","anno"=>1932]
            ];
            echo '<h3>Primer array</h3>';
            echo '<p>'.print_r($informacion,true).'<p>';
            $informacion2 = array (
                array("nombre"=>"Santiago","apellido"=>"Ramón y Cajal","anno"=>1852),
                array("nombre"=>"Juan","apellido"=>"Casals","anno"=>1932)
            );
            echo '<h3>Segundo array</h3>';
            echo '<p>'.print_r($informacion2,true).'<p>';
            //En las matrices multidimensionales se debe concatenar porque no hace la conversión a String de las Key
            echo '<p>Datos del segundo médico: '.$informacion2[1]["nombre"].'</p>';
            //O bien se pueden utilizar las llaves
            echo "<p>Datos del segundo médico: {$informacion2[1]["nombre"]}</p>";
            echo '<h3>Sobreescritura</h3>';
            //Si varios elementos utilizan la misma clave (key) solo se muestra la última
            //PHP convierte las claves
            //PHP no distingue entre array indexados (con key numética y en orden) de asociativos
            $abecedario = array (
                1 => "a",
                "1" => "b",
                1.5 => "c",
                true => "d"
            );
            echo '<p>'.print_r($abecedario,true).'<p>';
            $arraymixto = array (
                "uno" => "a",
                "dos" => "b",
                100 => "c",
                -100 => "d"
            );
            echo '<h3>Array Mixto</h3>';
            echo '<p>'.print_r($arraymixto,true).'<p>';
            $arraysorpresa = array (
                "a",
                "b",
                6 => "c",
                "d"
            );
            $arraysorpresa[] = array();
            $arraysorpresa[] = array(1,2,3);
            echo '<h3>Array Sorpresa</h3>';
            echo '<p>'.print_r($arraysorpresa,true).'<p>';
            echo '<p>Número de elementos del array es: '.count($arraysorpresa).'</p>';
            /**
            for($i = 0; $i < count($arraysorpresa); $i++) {
                echo 'posición: '.$i.', contiene: '.$arraysorpresa[$i].'</p>';
            }
            echo '<p>Se debe utilizar foreach para recorrer los array asociativos</p>';
            */
            echo '<h3>Foreach</h3>';
            $i = 0;
            foreach($arraysorpresa as $elemento) {
                if(!is_array($elemento)) echo 'posición: '.$i.', contiene: '.$elemento.'</p>';
                else echo 'posición: '.$i.', contiene: '.print_r($elemento, true).'</p>';
                $i++;
            }
            print '
            </body>
        </html>';
?>