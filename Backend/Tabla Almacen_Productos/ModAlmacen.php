<?php

    include_once 'ApiAlmacen.php';

    $api = new apialmacen();

    if(isset($_POST['Cantidad_producto']) isset($_POST['Status'])){
        $id = array('Id_almacen' => $_POST['Id_almacen']);
        $item = array('Cantidad_producto' => $_POST['Cantidad_producto'],
                      'Status' => $_POST['Status']);
        $api->ModAlmacen($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>