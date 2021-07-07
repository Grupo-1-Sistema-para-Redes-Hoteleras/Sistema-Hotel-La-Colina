<?php

    include_once 'ApiTipoHabitacion.php';

    $api = new apitipohabitacion();

    if(isset($_POST['nombre_tipo']) && 
       isset($_POST['status']) &&
       isset($_POST['fecha_registro'])){
        
        $item = array(
            'nombre_tipo' => $_POST['nombre_tipo'],
            'status' => $_POST['status'],
            'fecha_registro' => $_POST['fecha_registro']
        );
        $api->AddTipoHabitacion($item);

    }else{

        $api->error('Error al llamar a la API');

    }

?>