<?php

    include_once 'ApiFactura_cabe.php';

    $api = new apifacturas_cabe();

    if(isset($_POST['Fecha']) && isset($_POST['Id_cliente']) &&
       isset($_POST['Monto']) && isset($_POST['Cantidad_producto']) &&
       isset($_POST['Id_trabajador']) && isset($_POST['Id_reservacion']) &&
       isset($_POST['Id_servicio']) && isset($_POST['Id_promocion']) &&
       isset($_POST['Administrador_id_administrador']) && 
       isset($_POST['Fecha_registro'])){
        
        $item = array(
            'Fecha' => $_POST['Fecha'],
            'Id_cliente' => $_POST['Id_cliente'],
            'Monto' => $_POST['Monto'],
            'Cantidad_producto' => $_POST['Cantidad_producto'],
            'Id_trabajador' => $_POST['Id_trabajador'],
            'Id_reservacion' => $_POST['Id_reservacion'],
            'Id_servicio' => $_POST['Id_servicio'],
            'Id_promocion' => $_POST['Id_promocion'],
            'Administrador_id_administrador' => $_POST['Administrador_id_administrador'],
            'Fecha_registro' => $_POST['Fecha_registro']);
        $api->AddFactura_cabe($item);

    }else{

        $api->error('Error al llamar a la API');

    }

?>