<?php

    include_once 'ApiFactura_prov_cabe.php';

    $api = new apifacturas_prov_cabe();

    if(isset($_POST['Fecha']) && isset($_POST['Id_proveedor']) &&
       isset($_POST['Monto_total']) && isset($_POST['Cantidad_productos']) &&
       isset($_POST['Id_cargo']) && isset($_POST['Fecha_registro']) &&
       isset($_POST['Administrador_id_administrador'])){
        
        $item = array(
            'Fecha' => $_POST['Fecha'],
            'Id_proveedor' => $_POST['Id_proveedor'],
            'Monto_total' => $_POST['Monto_total'],
            'Cantidad_productos' => $_POST['Cantidad_productos'],
            'Id_cargo' => $_POST['Id_cargo'],
            'Fecha_registro' => $_POST['Fecha_registro'],
            'Administrador_id_administrador' => $_POST['Administrador_id_administrador']);
        $api->AddFactura_prov_cabe($item);

    }else{

        $api->error('Error al llamar a la API');

    }

?>