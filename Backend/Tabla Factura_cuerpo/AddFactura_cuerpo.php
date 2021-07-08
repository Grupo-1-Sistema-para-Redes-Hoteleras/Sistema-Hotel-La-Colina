<?php

    include_once 'ApiFactura_cuerpo.php';

    $api = new apifacturas_cuerpo();

    if(isset($_POST['Id_factura_cabe']) && isset($_POST['Cantidad']) &&
       isset($_POST['Status_reservacion']) && isset($_POST['Status_servicio']) &&
       isset($_POST['Status_promocion']) && isset($_POST['Fecha_registro'])){
        
        $item = array(
            'Id_factura_cabe' => $_POST['Id_factura_cabe'],
            'Cantidad' => $_POST['Cantidad'],
            'Status_reservacion' => $_POST['Status_reservacion'],
            'Status_servicio' => $_POST['Status_servicio'],
            'Status_promocion' => $_POST['Status_promocion'],
            'Fecha_registro' => $_POST['Fecha_registro']);
        $api->AddFactura_cuerpo($item);

    }else{

        $api->error('Error al llamar a la API');

    }

?>