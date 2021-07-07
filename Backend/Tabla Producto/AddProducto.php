<?php

    include_once 'ApiProducto.php';

    $api = new apiproducto();

    if(isset($_POST['Nombre_producto']) && isset($_POST['Status']) &&
       isset($_POST['Descripcion_producto']) && isset($_POST['Precio_producto']) &&
       isset($_POST['Fecha_registro'])){
        
        $item = array(
            'Nombre_producto' => $_POST['Nombre_producto'],
            'Status' => $_POST['Status'],
            'Descripcion_producto' => $_POST['Descripcion_producto'],
            'Precio_producto' => $_POST['Precio_producto'],
            'Fecha_registro' => $_POST['Fecha_registro']
        );
        $api->AddProducto($item);

    }else{

        $api->error('Error al llamar a la API');

    }

?>