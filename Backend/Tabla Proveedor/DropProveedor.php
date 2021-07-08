<?php

    include_once 'ApiProveedor.php';

    $api = new apiproveedor();

    if(isset($_POST['Status'])){
        $id = array('Id_proveedor' => $_POST['Id_proveedor']);
        $item = array('Status' => $_POST['Status']);
        $api->DropProveedor($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>