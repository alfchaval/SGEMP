<?php
    include_once 'app.php';
    $app = new App();
    $app->validateSession();

    $app->show_head("Dependencias");

    echo'<div class="title"><h1>Dependencias</h1></div>';

    $app->show_menu();

    echo'<div class="contenido">';

    echo'<form action="adddependency.php" method="post">
            <input type="text" name="name" placeholder="Name" required="required">
            <input type="text" name="shortname" placeholder="Shortname" required="required">
            <input type="text" name="description" placeholder="Description" required="required">
            <input type="submit" name="add" value="Add">
        </form></br></br>';

    try {
        if(isset($_POST['add'])) {
            $app->getDao()->addDependency($_POST['name'], $_POST['shortname'], $_POST['description']);
            echo 'Dependency added to database';
        }
    } catch (Exception $e) {
        echo'Error ejecutando la sentencia';
    }

    echo'</div>';

    $app->show_footer();
?>