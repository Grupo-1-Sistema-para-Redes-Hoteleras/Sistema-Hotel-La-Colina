<?php

    include_once 'ApiFactura_prov_cuerpo.php';

    $api = new apifacturas_prov_cuerpo();

    if(isset($_POST['Id_factura_proveedor_cabe']) && isset($_POST['Id_producto']) &&
       isset($_POST['Cantidad_producto']) && isset($_POST['Monto']) &&
       isset($_POST['Fecha_registro'])){
        
        $item = array(
            'Id_factura_proveedor_cabe' => $_POST['Id_factura_proveedor_cabe'],
            'Id_producto' => $_POST['Id_producto'],
            'Cantidad_producto' => $_POST['Cantidad_producto'],
            'Monto' => $_POST['Monto'],
            'Fecha_registro' => $_POST['Fecha_registro']);
        $api->AddFactura_prov_cuerpo($item);

    }else{

        $api->error('Error al llamar a la API');

    }

?>