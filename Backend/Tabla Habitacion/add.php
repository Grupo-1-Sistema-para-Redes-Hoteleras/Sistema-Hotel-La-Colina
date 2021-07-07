<?php

    include_once 'ApiHabitación.php';

    $api = new apihabitacion();

    if(isset($_POST['Id_tipo_habitacion']) && isset($_POST['Precio_habitacion']) &&
       isset($_POST['Status']) && isset($_POST['Numero_habitacion']) &&
       isset($_POST['Descripcion']) && isset($_POST['Fecha_registro']) &&
       isset($_POST['Administrador_id_administrador'])){
        
        $item = array(
            'Id_tipo_habitacion' => $_POST['Id_tipo_habitacion'],
            'Precio_habitacion' => $_POST['Precio_habitacion'],
            'Status' => $_POST['Status'],
            'Numero_habitacion' => $_POST['Numero_habitacion'],
            'Descripcion' => $_POST['Descripcion'],
            'Fecha_registro' => $_POST['Fecha_registro'],
            'Administrador_id_administrador' => $_POST['Administrador_id_administrador']
        );
        $api->add($item);

    }else{

        $api->error('Error al llamar a la API');

    }

?>