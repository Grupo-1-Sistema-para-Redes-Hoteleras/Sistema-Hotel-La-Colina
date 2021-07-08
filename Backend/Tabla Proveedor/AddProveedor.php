<?php

    include_once 'ApiProveedor.php';

    $api = new apiproveedor();

    if(isset($_POST['Nombre_proveedor']) && isset($_POST['Apellido_proveedor']) &&
       isset($_POST['Status']) && isset($_POST['Email_proveedor']) &&
       isset($_POST['Telf_proveedor']) && isset($_POST['Direccion_proveedor']) &&
       isset($_POST['Fecha_registro']) && 
       isset($_POST['Administrador_id_administrador'])){
        
        $item = array(
            'Nombre_proveedor' => $_POST['Nombre_proveedor'],
            'Apellido_proveedor' => $_POST['Apellido_proveedor'],
            'Status' => $_POST['Status'],
            'Email_proveedor' => $_POST['Email_proveedor'],
            'Telf_proveedor' => $_POST['Telf_proveedor'],
            'Direccion_proveedor' => $_POST['Direccion_proveedor'],
            'Fecha_registro' => $_POST['Fecha_registro'],
            'Administrador_id_administrador' => $_POST['Administrador_id_administrador']
        );
        $api->AddProveedor($item);

    }else{

        $api->error('Error al llamar a la API');

    }

?>