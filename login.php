<?php
    include_once "app.php";
    session_start();
    $app = new App();
    $app->show_head("Inicio de sesión");

    echo '<div class="title"><h1>Dependencias</h1></div>';

    $app->show_menu();

    echo '<div class="contenido">';
?>

<div class="login">
     <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="inputUser">Usuario</label>
            <input type="text" name="user" id="inputUser" value="" class="form-control" autofocus="autofocus"></input>
        </div>
        <div class="form-group">
            <label for="inputPassword">Contraseña</label>
            <input type="password" name="password" id="inputPassword" value="" class="form-control"></input>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Inicia sesión</button>
        </div>
    </form>
    
</div>

<?php
    echo '</br></br>';
    if($_SERVER['REQUEST_METHOD'] == 'POST'); {
        if(isset($_POST['user'])) $user = $_POST['user'];
        if(isset($_POST['password'])) $password = $_POST['password'];
        if(empty($user)) {
            echo '<p>Debe introducir un nombre de usuario </p>';
        }
        else if(empty($password)) {
            echo '<p>Debe introducir una contraseña </p>';
        }
        else {
            //Realizamos la conexión a la base de datos y se comprueba si el usuario existe
            $app = new App();
            if (!$app->getDao()->isConnected()) {
                echo '<p>'.$dao->error.'</p>';
            }
            else if ($app->getDao()->validateUser($user, $password)) {
                //Guardar la sesión de usuario
                $app->init_session($user);
                //Redireccionamos a otra página
                echo '<script language="javascript">window.location.href="listdependencies.php"</script>';
            }
            else {
                echo '<p>usuario incorrecto</p>';
            }
        }
    }

    echo '</div>';

    $app->show_footer();
?>