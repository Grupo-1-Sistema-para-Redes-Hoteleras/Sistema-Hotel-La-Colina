<?php

include_once 'ApiFactura_cabe.php';

header('Access-Control-Allow-Origin: *');

$api = new apifacturas_cabe();

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
