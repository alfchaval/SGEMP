<?php

    function show_head($titulo) {
        print '
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <link rel="stylesheet" type="text/css" href="style.css" />
                <title>'.$titulo.'</title>
                <meta charset="utf-8"/>
            </head>
            <body>';
    }

    function show_footer() {
        print '
            </body>
        </html>';
    }
    
?>