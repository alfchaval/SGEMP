<?php
include_once 'app.php';
$app = new App();
$app->validateSession();
$app->show_head("Listado Sectores");

echo'<div class="title"><h1>Sectores</h1></div>';

$app->show_menu();

echo'<div class="contenido">';

try {
    echo'<form action="';
        if(!isset($_GET['idDependency'])) {
            echo 'addsector.php';
        }
        else {
            echo 'addsector.php?idDependency='.$_GET['idDependency'];
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
    echo '</select>
        <input type="submit" name="add" value="Add">
        </form></br></br>';

    if(isset($_POST['add'])) {
        $app->getDao()->addSector($_POST['name'], $_POST['shortname'], $_POST['description'], $_POST['idDependency']);
        echo 'Sector added to database';
    }
    
    
} catch (Exception $e) {
    echo'Error ejecutando la sentencia';
}

echo '</div>';

$app->show_footer();

?>