<?php
    include_once 'app.php';
    $app = new App();
    $app->validateSession();

    $app->show_head("Dependencias");

    echo'<div class="text-center"><h1>Dependencias</h1></div>';

    $app->show_menu();

    echo'<div class="col-11 col-md-7 offset-md-2">
        <form action="inventory.php" method="post">
            <input type="text" name="name" placeholder="Name" required="required">
            <input type="text" name="shortname" placeholder="Shortname" required="required">
            <input type="text" name="description" placeholder="Description" required="required">
            <input type="submit" name="add" value="Add">
        </form></div></br></br>';

    try {
        if(isset($_POST['add'])) {
            $app->getDao()->addDependency($_POST['name'], $_POST['shortname'], $_POST['description']);
        }
        else if(isset($_GET['delete'])) {
            echo'<div class="col-11 col-md-7 offset-md-2">
                <table>
                    <tr>
                        <td>
                            Are you sure you want to delete dependency '.$_GET['delete'].'?
                        </td>
                        <td>
                            <form action="inventory.php" method="post">
                                <input type="hidden" name="id" value="'.$_GET['delete'].'">
                                <input type="submit" name="confirmedDelete" value="Delete">
                            </form>
                        </td>
                        <td>
                            <form action="inventory.php" method="post">
                                <input type="submit" name="cancel" value="Cancel">
                            </form>
                        </td>
                    </tr>
                </table>                
            </div></br></br>';
        }
        else if(isset($_POST['confirmedDelete'])) {
            $app->getDao()->deleteDependency($_POST['id']);
        }
        
        $resultset = $app->getDependency();
        $dependencies = $resultset->fetchAll();

        if(count($dependencies) > 0) {
            echo'<div class="col-11 col-md-7 offset-md-2">
            <table border="1">
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Shortname</th>
            <th>Description</th>
            <th>Sectores</th>';
            foreach($dependencies as $fila) {
                echo'<tr>
                    <td><a href="inventory.php?delete='.$fila['id'].'"><img src="http://icons.iconarchive.com/icons/awicons/vista-artistic/64/delete-icon.png" style="width:auto;"></a></td>
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
            echo'<div class="col-11 col-md-7 offset-md-2">No hay columnas que mostrar</div>';
        }
    } catch (Exception $e) {
        echo'<div class="col-11 col-md-7 offset-md-2">Error ejecutando la sentencia</div>';
    }

  //echo'<br>';
    //print_r($dependency);

    $app->show_footer();
?>