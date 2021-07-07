<?php

    include_once 'ApiTipoHabitacion.php';

    $api = new apitipohabitacion();

    if(isset($_POST['nombre_tipo'])){
        $id = array('id_tipo_habitacion' => $_POST['id_tipo_habitacion']);
        $item = array('nombre_tipo' => $_POST['nombre_tipo']);
        $api->ModTipoHabitacion($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>