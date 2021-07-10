<?php

include_once 'Factura_cuerpo.php';

class apifacturas_cuerpo{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $factura = new Factura_cuerpo();
        $facturas = array();

        $res = $factura -> obtenerfacturas_cuerpo();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id' => $row['Id_factura_cuerpo'],
                    'id_cabe' => $row['Id_factura_cabe'],
                    'quantity' => $row['Cantidad'],
                    'status_reservation' => $row['Status_reservacion'],
                    'status_service' => $row['Status_servicio'],
                    'status_promotion' => $row['Status_promocion'],
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
        $factura = new Factura_cuerpo();
        $facturas = array();

        $res = $factura->obtenerfactura_cuerpo($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'id' => $row['Id_factura_cuerpo'],
                    'id_cabe' => $row['Id_factura_cabe'],
                    'quantity' => $row['Cantidad'],
                    'status_reservation' => $row['Status_reservacion'],
                    'status_service' => $row['Status_servicio'],
                    'status_promotion' => $row['Status_promocion'],
                    'fecha_registro' => $row['Fecha_registro']
            );
            array_push($facturas, $item);

            $this->printJSON($facturas);
        }else{
            $this->error('No hay elementos');
        }
    }

    function AddFactura_cuerpo($item){

        $factura = new Factura_cuerpo();

        $res = $factura->nuevaFactura_cuerpo($item);

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
