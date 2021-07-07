<?php

    include_once 'ApiCliente.php';

    $api = new apicliente();

    if(isset($_POST['Status'])){
        $id = array('Id_cliente' => $_POST['Id_cliente']);
        $item = array('Status' => $_POST['Status']);
        $api->DropCliente($id, $item);
    }else{

    $api->error('Error al llamar a la API');
    }
?>