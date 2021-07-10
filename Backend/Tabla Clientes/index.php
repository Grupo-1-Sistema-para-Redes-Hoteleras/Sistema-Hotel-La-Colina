<?php

include_once 'ApiCliente.php';

header('Access-Control-Allow-Origin: *');

$api = new apicliente();

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        if(is_numeric($id)){
            $api->getById($id);
        }else{
            $api->error('El id es incorrecto');
        }
    }else{
        $api->getAll();
    }

?>
