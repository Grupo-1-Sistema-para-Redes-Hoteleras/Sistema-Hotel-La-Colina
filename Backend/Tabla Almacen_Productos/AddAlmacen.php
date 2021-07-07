<?php

    include_once 'ApiAlmacen.php';

    $api = new apialmacen();

    if(isset($_POST['Id_producto']) && isset($_POST['Cantidad_producto']) &&
       isset($_POST['Status']) && isset($_POST['Fecha_registro']) &&
       isset($_POST['Administrador_id_administrador'])){
        
        $item = array(
            'Id_producto' => $_POST['Id_producto'],
            'Cantidad_producto' => $_POST['Cantidad_producto'],
            'Status' => $_POST['Status'],
            'Fecha_registro' => $_POST['Fecha_registro'],
            'Administrador_id_administrador' => $_POST['Administrador_id_administrador']
        );
        $api->AddAlmacen($item);

    }else{

        $api->error('Error al llamar a la API');

    }

?>