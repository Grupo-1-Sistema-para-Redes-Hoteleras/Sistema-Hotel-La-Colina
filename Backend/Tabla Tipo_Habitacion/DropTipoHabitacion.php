<?php

    include_once 'ApiTipoHabitacion.php';

    $api = new apitipohabitacion();

    if(isset($_POST['status'])){
        $id = array('id_tipo_habitacion' => $_POST['id_tipo_habitacion']);
        $item = array('status' => $_POST['status']);
        $api->DropTipoHabitacion($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>