<?php

include_once 'ApiFactura_prov_cuerpo.php';

header('Access-Control-Allow-Origin: *');

$api = new apifacturas_prov_cuerpo();

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
