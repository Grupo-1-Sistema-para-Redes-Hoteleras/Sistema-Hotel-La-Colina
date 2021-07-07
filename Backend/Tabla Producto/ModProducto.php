<?php

    include_once 'ApiProducto.php';

    $api = new apiproducto();

    if(isset($_POST['Status']) && isset($_POST['Descripcion_producto']) && 
       isset($_POST['Precio_producto'])){
        $id = array('Id_producto' => $_POST['Id_producto']);
        $item = array('Status' => $_POST['Status'],
                      'Descripcion_producto' => $_POST['Descripcion_producto'],
                      'Precio_producto' => $_POST['Precio_producto']);
        $api->ModProducto($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>