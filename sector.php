<?php
include_once 'app.php';
$app = new App();
$app->validateSession();
$app->show_head("Listado Sectores");

echo'<div class="text-center"><h1>Sectores</h1></div>';

$app->show_menu();

try {
    echo'<div class="col-11 col-md-7 offset-md-2">
        <form action="';
        if(!isset($_GET['idDependency'])) {
            echo 'sector.php';
        }
        else {
            echo 'sector.php?idDependency='.$_GET['idDependency'];
        }
        echo '" method="post">
            <input type="text" name="name" placeholder="Name" required="required">
            <input type="text" name="shortname" placeholder="Shortname" required="required">
            <input type="text" name="description" placeholder="Description" required="required">
            <select name="idDependency" placeholder="IdDependency" required="required">';
            if(isset($_GET['idDependency'])) {
                echo '<option value="'.$_GET['idDependency'].'">Id '.$_GET['idDependency'].'</option>';
            }
            else {
                $dependencies = $app->getDependency()->fetchAll();
                foreach($dependencies as $dependency) {
                    echo '<option value="'.$dependency['id'].'">Id '.$dependency['id'].'</option>';
                }
            }
    echo'<input type="submit" name="add" value="Add">
        </form></div></br></br>';

    if(isset($_POST['add'])) {
        $app->getDao()->addSector($_POST['name'], $_POST['shortname'], $_POST['description'], $_POST['idDependency']);
    }
    else if(isset($_GET['delete'])) {
        echo'<div class="col-11 col-md-7 offset-md-2">
        <table>
            <tr>
                <td>
                    Are you sure you want to delete sector '.$_GET['delete'].'?
                </td>
                <td>
                    <form action="';
                    if(!isset($_GET['idDependency'])) {
                        echo 'sector.php';
                    }
                    else {
                        echo 'sector.php?idDependency='.$_GET['idDependency'];
                    }
                    echo '" method="post">
                        <input type="hidden" name="id" value="'.$_GET['delete'].'">
                        <input type="submit" name="confirmedDelete" value="Delete">
                    </form>
                </td>
                <td>
                    <form action="';
                    if(!isset($_GET['idDependency'])) {
                        echo 'sector.php';
                    }
                    else {
                        echo 'sector.php?idDependency='.$_GET['idDependency'];
                    }
                    echo '" method="post">
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

    if(!isset($_GET['idDependency'])) {
        $sector = $app->getDao()->getSectors(null)->fetchAll();
    } else {
        $sector = $app->getDao()->getSectors($_GET['idDependency'])->fetchAll();
    }

    if (count($sector) > 0) {
        echo'
        <div class="col-11 col-md-7 offset-md-2">
        <table border="1">
        <th></th>
        <th>ID</th>
        <th>Name</th>
        <th>Shortname</th>
        <th>Description</th>
        <th>IDDependency</th>';
        foreach($sector as $fila) {
            echo'<tr>
                <td><a href="sector.php?delete='.$fila['id'].'"><img src="http://icons.iconarchive.com/icons/awicons/vista-artistic/64/delete-icon.png" style="width:auto;"></a></td>
                <td>'.$fila['id'].'</td>
                <td>'.$fila['name'].'</td>
                <td>'.$fila['shortname'].'</td>
                <td>'.$fila['description'].'</td>
                <td>'.$fila['id_dependency'].'</td> 
            </tr>';
        }
        echo'</table>
        </div>';
    } else {
        echo '<div class="col-11 col-md-7 offset-md-2">No hay sectores en la dependencia</div>';
    }
} catch (Exception $e) {
    echo'<div class="col-11 col-md-7 offset-md-2">Error ejecutando la sentencia</div>';
}

echo '';

$app->show_footer();

?>