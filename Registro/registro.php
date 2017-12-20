<?php
    include "biblioteca.php";
    show_head("Registro");

    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $date = $_POST["date"];
    $ciudad = $_POST["ciudad"];
    $postal = $_POST["postal"];
    $pais = $_POST["pais"];
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $ofertas = $_POST["ofertas"];

    if($password != $password2) {
        echo 'Las contraseñas no coinciden';
    }
    else if(!isset($_POST["acepto"])) {
        echo 'Debe aceptar las condiciones';
    }
    else {
        echo '<p>Nombre: '.$nombre.' '.$apellidos.'</p>';
        echo '<p>Email: '.$email.'</p>';
        echo '<p>Fecha de nacimiento: '.$date.'</p>';
        echo '<p>Dirección: '.$pais.', '.$ciudad.', '.$postal.'</p>';
        echo '<p>Usuario: '.$usuario.'</p>';
    }
    show_footer();
?>