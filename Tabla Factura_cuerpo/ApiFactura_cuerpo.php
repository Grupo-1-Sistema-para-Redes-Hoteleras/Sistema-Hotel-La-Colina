<?php

include_once 'Factura_cuerpo.php';

class apifacturas_cuerpo{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $factura = new Factura_cuerpo();
        $facturas = array();
        $facturas ["items"] = array();

        $res = $factura -> obtenerfacturas_cuerpo();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'Id_factura_cuerpo' => $row['Id_factura_cuerpo'],
                    'Id_factura_cabe' => $row['Id_factura_cabe'],
                    'Cantidad' => $row['Cantidad'],
                    'Status_reservacion' => $row['Status_reservacion'],
                    'Status_servicio' => $row['Status_servicio'],
                    'Status_promocion' => $row['Status_promocion'],
                    'Fecha_registro' => $row['Fecha_registro']
                );
                array_push($facturas['items'], $item);
            }

            $this->printJSON($facturas);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $factura = new Factura_cuerpo();
        $facturas = array();
        $facturas["items"] = array();

        $res = $factura->obtenerfactura_cuerpo($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                'Id_factura_cuerpo' => $row['Id_factura_cuerpo'],
                'Id_factura_cabe' => $row['Id_factura_cabe'],
                'Cantidad' => $row['Cantidad'],
                'Status_reservacion' => $row['Status_reservacion'],
                'Status_servicio' => $row['Status_servicio'],
                'Status_promocion' => $row['Status_promocion'],
                'Fecha_registro' => $row['Fecha_registro']
            );
            array_push($facturas["items"], $item);

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
        echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>'; 
    }

    function exito($mensaje){
        echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>';
    }

    function printJSON($array){
        echo '<code>'.json_encode($array).'</code>';
    }
}
    
?>