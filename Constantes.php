<?php
    /**
     * En primer lugar se incluyen los ficheros a usar
     */

    /**
     * En segundo lugar se definen las constantes
    */
    define ("TRIANGULO", 1);
    define ("CUADRADO", 2);
    define ("RECTANGULO", 3);
    define ("CIRCUNFERENCIA", 4);
    define ("MIN_VALUE_RAND", 1);
    define ("MAX_VALUE_RAND", 4);

    $base = 3;
    $altura = 5;
    $lado = 3;
    $lado1 = 6;
    $lado2 = 7;
    $radio = 4;

    const PI = 3.14;

    print '
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <title>Área de una figura</title>
                <meta charset="utf-8"/>
            </head>
            <body>';
            $figura=rand(MIN_VALUE_RAND, MAX_VALUE_RAND);
            switch($figura) {
                case TRIANGULO:
                    echo 'El área del triángulo con base: '.$base.' y altura: '.$altura.' es '.area_triangulo($base, $altura); 
                    break;
                case CUADRADO:
                    echo 'El área del cuadrado con lado: '.$lado.' es '.area_cuadrado($lado);
                    break;
                case RECTANGULO:
                    echo 'El área del rectángulo con lados: '.$lado1.' y '.$lado2.' es '.area_rectangulo($lado1, $lado2);
                    break;
                case CIRCUNFERENCIA:
                    echo 'El área de la circunferencia con radio: '.$radio.' es '.area_circunferencia();
                    break;
            }

            function area_triangulo($base, $altura) {
                return ($base * $altura / 2);
            }

            function area_cuadrado($lado) {
                return area_rectangulo($lado, $lado);
            }

            function area_rectangulo($lado1, $lado2) {
                return ($lado1 * $lado2);
            }

            function area_circunferencia() {
                //con global puedes usar variables definidas fuera de la función.
                //si se definen variables locales con el mismo nombre que una global, usa siempre la local.
                //no es necesario para acceder a las constantes
                global $radio;
                return (2 * PI * $radio);
            }
    print '
            </body>
        </html>';
?>