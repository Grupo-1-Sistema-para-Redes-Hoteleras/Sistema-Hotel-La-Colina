<?php

    include_once 'ApiProducto.php';

    $api = new apiproducto();

    if(isset($_POST['Status']) && isset($_POST['Status'])){
        $id = array('Id_producto' => $_POST['Id_producto']);
        $item = array('Status' => $_POST['Status']);
        $api->DropProducto($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>