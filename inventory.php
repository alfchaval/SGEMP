<?php
    include_once 'app.php';
    $app = new App();
    $app->validateSession();

    $emails = $app->getDao()->select("email","user");
    foreach($emails as $email) {
        echo $email["email"];
    }
    
?>