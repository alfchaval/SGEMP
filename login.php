<?php
    include_once "app.php";
    session_start();
    $app = new App();
    $app->show_head("Inicio de sesión");
    $app->show_menu();
?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-4 offset-md-4">
            <h1>Inicio Sesión</h1>
            <div class="row">
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
        </div>
    </div>
</div>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'); {
        $user = $_POST['user'];
        $password = $_POST['password'];
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
                echo '<script language="javascript">window.location.href="inventory.php"</script>';
            }
            else {
                echo '<p>usuario incorrecto</p>';
            }
        }
    }
    $app->show_footer();
?>