<?php

    include_once 'ApiAlmacen.php';

    $api = new apialmacen();

    if(isset($_POST['Status'])){
        $id = array('Id_almacen' => $_POST['Id_almacen']);
        $item = array('Status' => $_POST['Status']);
        $api->DropAlmacen($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>