<?php

    include_once 'ApiCliente.php';

    $api = new apicliente();

    if(isset($_POST['Email_cliente']) && isset($_POST['Telf_cliente'])){
        $id = array('Id_cliente' => $_POST['Id_cliente']);
        $item = array('Email_cliente' => $_POST['Email_cliente'],
                      'Telf_cliente' => $_POST['Telf_cliente']);
        $api->ModCliente($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>