<?php

    include_once 'ApiAdministrador.php';

    $api = new apiadministrador();

    if(isset($_POST['Nombre_administrador']) && isset($_POST['Usuario_administrador']) && 
       isset($_POST['Password_administrador']) && isset($_POST['Nivel_administrador'])){
        $id = array('Id_administrador' => $_POST['Id_administrador']);
        $item = array('Nombre_administrador' => $_POST['Nombre_administrador'],
                      'Usuario_administrador' => $_POST['Usuario_administrador'],
                      'Password_administrador' => $_POST['Password_administrador'],
                      'Nivel_administrador' => $_POST['Nivel_administrador']);
        $api->ModAdministrador($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>