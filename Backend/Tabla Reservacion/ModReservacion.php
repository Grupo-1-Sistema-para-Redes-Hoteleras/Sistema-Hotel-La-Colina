<?php

    include_once 'ApiReservacion.php';

    $api = new apireservacion();

    if(isset($_POST['Status']) && isset($_POST['Cantidad_personas'])){
        $id = array('Id_reservacion' => $_POST['Id_reservacion']);
        $item = array('Status' => $_POST['Status'],
                      'Cantidad_personas' => $_POST['Cantidad_personas']);
        $api->ModReservacion($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>