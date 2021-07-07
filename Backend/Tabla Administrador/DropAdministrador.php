<?php

    include_once 'ApiAdministrador.php';

    $api = new apiadministrador();

    if(isset($_POST['Status_administrador'])){
        $id = array('Id_administrador' => $_POST['Id_administrador']);
        $item = array('Status_administrador' => $_POST['Status_administrador']);
        $api->DropAdministrador($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>