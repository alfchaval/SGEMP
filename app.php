<?php

include_once "dao.php";

class App {

    protected $dao;

    function __construct() {
        $this->dao = new Dao();
    }

    static function show_head($titulo) {
        print '
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
                <link rel="stylesheet" type="text/css" href="css/alfchaval.css" />
                <title>'.$titulo.'</title>
                <meta charset="utf-8"/>
            </head>
            <body>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
            ';
    }

    static function show_menu() {
        print '
            <div class="menu">
            <ul>
                <li class="menu-item"><a href="informacion.php">Información</a></li>';
        if(isset($_SESSION['user'])) {
            print '<li class="menu-section">Dependencies</li>
                    <li class="menu-subitem"><a href="listdependencies.php">List of dependencies</a></li>
                    <li class="menu-subitem"><a href="adddependency.php">Add new dependency</a></li>
                    <li class="menu-section">Sectors</li>
                    <li class="menu-subitem"><a href="listsectors.php">List of sectors</a></li>
                    <li class="menu-subitem"><a href="addsector.php">Add new sector</a></li>
                <li class="menu-item"><a href="logout.php">Logout</a></li>';
        } else {
            print '<li class="menu-item"><a href="login.php">Login</a></li>';
        }
        print '</ul>
            </div>';
    }

    static function show_footer() {
        print '
            </body>
        </html>';
    }

    function getDao() {
        return $this->dao;
    }

    /**
     * Función que guarda el nombre de usuario en la variable $SESSION
     */
    function init_session ($user) {
        if(!isset($_SESSION['user'])){
            $_SESSION['user'] = $user;
        }
    }

    /**
     * Función que comprueba si un usuaio está logeado
     */

    function validateSession() {
        session_start();
        if(!$this->isLogged()) {
            $this->showLogin();
        }
    }

    /**
     * Función que comprueba si se ha iniciado sesión
     */
    function isLogged() {
        return isset($_SESSION['user']);
    }

    /**
     * Función que redirige al login
     */
    function showLogin() {
        header('Location: login.php');
    }

    /**
     * Función que elimina la sesión previamente creada
     */
    function delete_session() {
        if(isset($SESSION['user'])) {
            unset($SESSION['user']);
        }
        session_destroy();
        $this->showLogin();
    }

    function getDependency(){
        return $this->dao->getDependency();
    }
}

?>