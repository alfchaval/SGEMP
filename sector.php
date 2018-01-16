<?php
include_once 'app.php';
$app = new App();
$app->validateSession();
$app->show_head("Listado Sectores");
$idDependency = $_GET['idDependency'];

echo'<div class="text-center"><h1>Sectores</h1>';

$app->show_menu();

if(!isset($idDependency)) {
    
} else {
    $sector = $app->getDao()->getSectors($idDependency)->fetchAll();
    //Si hay un error con la base de datos
    
    if (count($sector) > 0) {
        echo'
        <div class="col-11 col-md-5 offset-md-3">
        <table border="1">
        <th>ID</th>
        <th>Name</th>
        <th>Shortname</th>
        <th>Description</th>
        <th>IDDependency</th>';
        foreach($sector as $fila) {
            echo'<tr>
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
        echo "<p>No hay sectores en la dependencia</p>";
    }
}

echo '';

$app->show_footer();

?>