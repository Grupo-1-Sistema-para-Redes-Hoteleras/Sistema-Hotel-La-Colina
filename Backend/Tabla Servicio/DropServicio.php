<?php

    include_once 'ApiServicio.php';

    $api = new apiservicio();

    if(isset($_POST['Status'])){
        $id = array('Id_servicio' => $_POST['Id_servicio']);
        $item = array('Status' => $_POST['Status']);
        $api->DropServicio($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>