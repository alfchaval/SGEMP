<?php
    include_once 'app.php';
    $app = new App();
    $app->validateSession();

    $app->show_head("Dependencias");

    echo'<div class="title"><h1>Dependencias</h1></div>';

    $app->show_menu();

    echo'<div class="contenido">';

    try {
        if(isset($_GET['delete'])) {
            if(count($app->getDao()->getSectors($_GET['delete'])->fetchAll()) > 0) {
                echo 'This dependency has associated sectors and can not be deleted';
            } else {
                echo'<table>
                    <tr>
                        <td>
                            Are you sure you want to delete dependency '.$_GET['delete'].'?
                        </td>
                        <td>
                            <form action="listdependencies.php" method="post">
                                <input type="hidden" name="id" value="'.$_GET['delete'].'">
                                <input type="submit" name="confirmedDelete" value="Delete">
                            </form>
                        </td>
                        <td>
                            <form action="listdependencies.php" method="post">
                                <input type="submit" name="cancel" value="Cancel">
                            </form>
                        </td>
                    </tr>
                </table>                
            </br></br>';
            }            
        }
        else if(isset($_POST['confirmedDelete'])) {
            $app->getDao()->deleteDependency($_POST['id']);
            echo 'Dependency '.$_POST['id'].' deleted</br></br>';
        }
        
        $resultset = $app->getDependency();
        $dependencies = $resultset->fetchAll();

        if(count($dependencies) > 0) {
            echo'<div class="list">
            <table border="1">
                <th width="1%"></th>
                <th width="5%">ID</th>
                <th width="35%">Name</th>
                <th width="1%">Shortname</th>
                <th width="65%">Description</th>
                <th width="1%">Sectores</th>';
            foreach($dependencies as $fila) {
                echo'<tr>
                    <td width="1%"><a href="listdependencies.php?delete='.$fila['id'].'"><img src="https://forum-narutoen.oasgames.com/static/front/classical/images/white/forum_tips_false.png" style="width:auto;"></a></td>
                    <td width="5%">'.$fila['id'].'</td>
                    <td width="35%">'.$fila['name'].'</td>
                    <td width="1%">'.$fila['shortname'].'</td>
                    <td width="65%">'.$fila['description'].'</td>
                    <td width="1%"><a href="listsectors.php?idDependency='.$fila['id'].'"><img src="https://cdn.dribbble.com/assets/icon-shotstat-share-128ae71c26985fc7325ac5362aba434686f12fdfffa45ed874262a19f923b071.png" style="width:auto;"></a></td> 
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

    echo'</div>';

    $app->show_footer();
?>