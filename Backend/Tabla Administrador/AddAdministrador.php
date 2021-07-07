<?php

    include_once 'ApiAdministrador.php';

    $api = new apiadministrador();

    if(isset($_POST['Id_administrador']) && isset($_POST['Nombre_administrador']) &&
       isset($_POST['Usuario_administrador']) && isset($_POST['Password_administrador']) &&
       isset($_POST['Status_administrador']) && isset($_POST['Fecha']) &&
       isset($_POST['Nivel_administrador'])){
        
        $item = array(
            'Id_administrador' => $_POST['Id_administrador'],
            'Nombre_administrador' => $_POST['Nombre_administrador'],
            'Usuario_administrador' => $_POST['Usuario_administrador'],
            'Password_administrador' => $_POST['Password_administrador'],
            'Status_administrador' => $_POST['Status_administrador'],
            'Fecha' => $_POST['Fecha'],
            'Nivel_administrador' => $_POST['Nivel_administrador']
        );
        $api->AddAdministrador($item);

    }else{

        $api->error('Error al llamar a la API');

    }

?>