<?php

include_once 'ApiPromocion.php';

header('Access-Control-Allow-Origin: *');

$api = new apipromocion();

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
