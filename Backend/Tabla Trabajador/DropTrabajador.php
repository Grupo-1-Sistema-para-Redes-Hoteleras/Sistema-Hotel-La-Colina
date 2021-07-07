<?php

    include_once 'ApiTrabajador.php';

    $api = new apitrabajador();

    if(isset($_POST['Status_trabajador'])){
        $id = array('Id_trabajador' => $_POST['Id_trabajador']);
        $item = array('Status_trabajador' => $_POST['Status_trabajador']);
        $api->DropTrabajador($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>