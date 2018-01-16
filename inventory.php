<?php
    include_once 'app.php';
    $app = new App();
    $app->validateSession();

    $app->show_head("Dependencias");

    echo'<div class="text-center"><h1>Dependencias</h1></div>';

    $app->show_menu();

    try {
        $resultset = $app->getDependency();
        $dependency = $resultset->fetchAll();

        if(count($dependency) > 0) {
            echo'<div class="col-11 col-md-5 offset-md-3">
            <table border="1">
            <th>ID</th>
            <th>Name</th>
            <th>Shortname</th>
            <th>Description</th>
            <th>Sector</th>';
            foreach($dependency as $fila) {
                echo'<tr>
                    <td>'.$fila['id'].'</td>
                    <td>'.$fila['name'].'</td>
                    <td>'.$fila['shortname'].'</td>
                    <td>'.$fila['description'].'</td>
                    <td><a href="sector.php?idDependency='.$fila['id'].'"><img src="https://cdn.dribbble.com/assets/icon-shotstat-share-128ae71c26985fc7325ac5362aba434686f12fdfffa45ed874262a19f923b071.png" style="width:auto;"></a></td> 
                </tr>';
            }
            echo'</table>
            </div>';
        }
        else {
            echo'No hay columnas que mostrar';
        }
    } catch (Exception $e) {
        echo'Error ejecutando la sentencia';
    }

    //echo'<br>';
    //print_r($dependency);

    $app->show_footer();
?>