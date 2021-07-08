<?php

    include_once 'ApiProveedor.php';

    $api = new apiproveedor();

    if(isset($_POST['Email_proveedor']) && isset($_POST['Telf_proveedor']) && 
       isset($_POST['Direccion_proveedor'])){
        $id = array('Id_proveedor' => $_POST['Id_proveedor']);
        $item = array('Email_proveedor' => $_POST['Email_proveedor'],
                      'Telf_proveedor' => $_POST['Telf_proveedor'],
                      'Direccion_proveedor' => $_POST['Direccion_proveedor']);
        $api->ModProveedor($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>