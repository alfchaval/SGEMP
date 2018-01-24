<?php
    include_once "app.php";
    session_start();
    $app = new App();
    $app->show_head("Información");
    echo'<div class="title"><h1>Información</h1></div>';
    $app->show_menu();
    echo '<div class="contenido">
            Mejor página de información jamás creada por la historia de la humanidad</br>
            <iframe src="bb8.html" height="600" width="800"></iframe>
        </div>
    ';

    $app->show_footer();
?>