<?php

    include_once 'ApiServicio.php';

    $api = new apiservicio();

    if(isset($_POST['Nombre_servicio']) && isset($_POST['Precio_servicio']) &&
       isset($_POST['Status']) && isset($_POST['Descripcion']) && 
       isset($_POST['Administrador_id_administrador']) && isset($_POST['Fecha_registro'])){
        
        $item = array(
            'Nombre_servicio' => $_POST['Nombre_servicio'],
            'Precio_servicio' => $_POST['Precio_servicio'],
            'Status' => $_POST['Status'],
            'Descripcion' => $_POST['Descripcion'],
            'Administrador_id_administrador' => $_POST['Administrador_id_administrador'],
            'Fecha_registro' => $_POST['Fecha_registro']
        );
        $api->AddServicio($item);

    }else{

        $api->error('Error al llamar a la API');

    }

?>