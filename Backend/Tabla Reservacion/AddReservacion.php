<?php

    include_once 'ApiReservacion.php';

    $api = new apireservacion();

    if(isset($_POST['Fecha_reservacion']) && isset($_POST['Status']) &&
       isset($_POST['Cantidad_personas']) && isset($_POST['Id_cliente']) &&
       isset($_POST['Id_habitacion']) && 
       isset($_POST['Administrador_id_administrador']) && 
       isset($_POST['Fecha_registro'])){
        
        $item = array(
            'Fecha_reservacion' => $_POST['Fecha_reservacion'],
            'Status' => $_POST['Status'],
            'Cantidad_personas' => $_POST['Cantidad_personas'],
            'Id_cliente' => $_POST['Id_cliente'],
            'Id_habitacion' => $_POST['Id_habitacion'],
            'Administrador_id_administrador' => $_POST['Administrador_id_administrador'],
            'Fecha_registro' => $_POST['Fecha_registro']
        );
        $api->AddReservacion($item);

    }else{

        $api->error('Error al llamar a la API');

    }

?>