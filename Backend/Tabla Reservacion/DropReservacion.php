<?php

    include_once 'ApiReservacion.php';

    $api = new apireservacion();

    if(isset($_POST['Status'])){
        $id = array('Id_reservacion' => $_POST['Id_reservacion']);
        $item = array('Status' => $_POST['Status']);
        $api->DropReservacion($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>