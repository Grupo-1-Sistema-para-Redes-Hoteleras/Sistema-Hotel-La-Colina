<?php

include_once 'Factura_cabe.php';

class apifacturas_cabe{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $factura = new Factura_cabe();
        $facturas = array();

        $res = $factura -> obtenerfacturas_cabe();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id' => $row['Id_factura'],
                    'fecha' => $row['Fecha'],
                    'id_client' => $row['Id_cliente'],
                    'amount' => $row['Monto'],
                    'quantity' => $row['Cantidad_producto'],
                    'id_empl' => $row['Id_trabajador'],
                    'id_reservation' => $row['Id_reservacion'],
                    'id_service' => $row['Id_servicio'],
                    'id_promotion' => $row['Id_promocion'],
                    'id_Admin' => $row['Administrador_id_administrador'],
                    'fecha_registro' => $row['Fecha_registro']
                );
                array_push($facturas, $item);
            }

            $this->printJSON($facturas);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $factura = new Factura_cabe();
        $facturas = array();

        $res = $factura->obtenerfactura_cabe($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'id' => $row['Id_factura'],
                    'fecha' => $row['Fecha'],
                    'id_client' => $row['Id_cliente'],
                    'amount' => $row['Monto'],
                    'quantity' => $row['Cantidad_producto'],
                    'id_empl' => $row['Id_trabajador'],
                    'id_reservation' => $row['Id_reservacion'],
                    'id_service' => $row['Id_servicio'],
                    'id_promotion' => $row['Id_promocion'],
                    'id_Admin' => $row['Administrador_id_administrador'],
                    'fecha_registro' => $row['Fecha_registro']
            );
            array_push($facturas, $item);

            $this->printJSON($facturas);
        }else{
            $this->error('No hay elementos');
        }
    }

    function AddFactura_cabe($item){

        $factura = new Factura_cabe();

        $res = $factura->nuevaFactura_cabe($item);

        $this->exito('Nueva Factura Registrada');

    }

    function error($mensaje){
        echo json_encode(array('mensaje' => $mensaje)); 
    }

    function exito($mensaje){
        echo json_encode(array('mensaje' => $mensaje));
    }

    function printJSON($array){
        echo json_encode($array);
    }
}
    
?>
