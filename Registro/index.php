<?php
    include "biblioteca.php";
    show_head("Registro");

    echo '
    
    <h1>Formulario Registro</h1>
    
    <h3>Datos usuario</h3>
    
    <form action="registro.php" method="post">
    
        <fieldset>
        <legend>¿QUIÉN ERES?</legend>
        
            <p>Nombre</p>
            <input type="text" name="nombre" required="required"> <br>
            <p>Apellidos</p>
            <input type="text" name="apellidos" required="required"> <br>
            <p>Correo electrónico</p>
            <input type="text" name="email" required="required"> <br>
            <p>Fecha de nacimiento</p>
            <input type="date" name="date" id="date" value="'.date('Y-m-d').'">

        </fieldset> <br>

        <fieldset>
        <legend>¿DE DÓNDE ERES?</legend>
            
            <p>Ciudad</p>
            <input type="text" name="ciudad" required="required"> <br>
            <p>Código postal</p>
            <input type="text" name="postal" required="required"> <br>
            <p>País</p>
            <select name="pais" required="required">
                <option value="Spain">España</option>
                <option value="EEUU">EEUU</option>
                <option value="Catalonia">Cataluña</option>
            </select>

        </fieldset> <br>

        <fieldset>
        <legend>¿CÓMO QUIERES INICIAR SESIÓN?</legend>
        
            <p>Nombre de usuario</p>
            <input type="text" name="usuario" required="required"> <br>
            <p>Contraseña</p>
            <input type="password" name="password" required="required"> <br>
            <p>Vuelve a escribir la contraseña</p>
            <input type="password" name="password2" required="required"> <br>

        </fieldset> <br>
        
        <fieldset>
        <legend>CONDICIONES DE REGISTRO</legend>
        
            <p>Deseo recibir ofertas de IDESWEB</p>

            <input type="radio" id="ofertasDia" name="ofertas" value="email">
            <label for="ofertasDia">Una vez al día</label>
       
            <input type="radio" id="ofertasSemana" name="ofertas" value="phone" checked="checked">
            <label for="ofertasSemana">Una vez a la semana</label>
       
            <input type="radio" id="ofertasM name="ofertas" value="mail">
            <label for="ofertasMes">Una vez al mes</label>

            <input type="radio" id="ofertasNunca" name="ofertas" value="mail">
            <label for="ofertasNunca">No deseo recibir ofertas</label> <br>
            
            <p> <input type="checkbox" name="acepto"> Acepto el acuerdo de servicios, la declaración de privacidad y la declaración de cookies</p>

        </fieldset> <br>  
        
        <input type="submit" value="Crear cuenta">
    </form>';
    
    show_footer();
?>