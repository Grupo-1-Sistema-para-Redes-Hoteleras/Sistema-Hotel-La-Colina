<?php

    include_once 'ApiCliente.php';

    $api = new apicliente();

    if(isset($_POST['Cedula_cliente']) && isset($_POST['Nombre_cliente']) &&
       isset($_POST['Apellido_cliente']) && isset($_POST['Status']) &&
       isset($_POST['Email_cliente']) && isset($_POST['Telf_cliente']) &&
       isset($_POST['Administrador_id_administrador']) && 
       isset($_POST['Fecha_registro'])){
        
        $item = array(
            'Cedula_cliente' => $_POST['Cedula_cliente'],
            'Nombre_cliente' => $_POST['Nombre_cliente'],
            'Apellido_cliente' => $_POST['Apellido_cliente'],
            'Status' => $_POST['Status'],
            'Email_cliente' => $_POST['Email_cliente'],
            'Telf_cliente' => $_POST['Telf_cliente'],
            'Administrador_id_administrador' => $_POST['Administrador_id_administrador'],
            'Fecha_registro' => $_POST['Fecha_registro']
        );
        $api->AddCliente($item);

    }else{

        $api->error('Error al llamar a la API');

    }

?>