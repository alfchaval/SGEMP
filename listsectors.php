<?php
include_once 'app.php';
$app = new App();
$app->validateSession();
$app->show_head("Listado Sectores");

echo'<div class="title"><h1>Sectores</h1></div>';

$app->show_menu();

echo'<div class="contenido">';

try {
    if(isset($_GET['delete'])) {
        echo'<table>
            <tr>
                <td>
                    Are you sure you want to delete sector '.$_GET['delete'].'?
                </td>
                <td>
                    <form action="';
                    if(!isset($_GET['idDependency'])) {
                        echo 'listsectors.php';
                    }
                    else {
                        echo 'listsectors.php?idDependency='.$_GET['idDependency'];
                    }
                    echo '" method="post">
                        <input type="hidden" name="id" value="'.$_GET['delete'].'">
                        <input type="submit" name="confirmedDelete" value="Delete">
                    </form>
                </td>
                <td>
                    <form action="';
                    if(!isset($_GET['idDependency'])) {
                        echo 'listsectors.php';
                    }
                    else {
                        echo 'listsectors.php?idDependency='.$_GET['idDependency'];
                    }
                    echo '" method="post">
                        <input type="submit" name="cancel" value="Cancel">
                    </form>
                </td>
            </tr>
        </table>                
    </br></br>';
    }
    else if(isset($_POST['confirmedDelete'])) {
        $app->getDao()->deleteDependency($_POST['id']);
        echo 'Sector '.$_POST['id'].' deleted</br></br>';
    }

    if(!isset($_GET['idDependency'])) {
        $sector = $app->getDao()->getSectors(null)->fetchAll();
    } else {
        $sector = $app->getDao()->getSectors($_GET['idDependency'])->fetchAll();
    }

    if (count($sector) > 0) {
        echo'<div class="list">
        <table border="1">
            <th width="1%"></th>
            <th width="5%">ID</th>
            <th width="35%">Name</th>
            <th width="1%">Shortname</th>
            <th width="65%">Description</th>
            <th width="1%">IDDependency</th>';
        foreach($sector as $fila) {
            echo'<tr>
                <td width="1%"><a href="listsectors.php?delete='.$fila['id'].'"><img src="https://forum-narutoen.oasgames.com/static/front/classical/images/white/forum_tips_false.png" style="width:auto;"></a></td>
                <td width="5%">'.$fila['id'].'</td>
                <td width="35%">'.$fila['name'].'</td>
                <td width="1%">'.$fila['shortname'].'</td>
                <td width="65%">'.$fila['description'].'</td>
                <td width="1%">'.$fila['id_dependency'].'</td> 
            </tr>';
        }
        echo'</table>
        </div>';
    } else {
        echo 'No hay sectores en la dependencia';
    }
} catch (Exception $e) {
    echo'Error ejecutando la sentencia';
}

echo '</div>';

$app->show_footer();

?>