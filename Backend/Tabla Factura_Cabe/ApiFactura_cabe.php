<?php

include_once 'Factura_cabe.php';

class apifacturas_cabe{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $factura = new Factura_cabe();
        $facturas = array();
        $facturas ["items"] = array();

        $res = $factura -> obtenerfacturas_cabe();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'Id_factura' => $row['Id_factura'],
                    'Fecha' => $row['Fecha'],
                    'Id_cliente' => $row['Id_cliente'],
                    'Monto' => $row['Monto'],
                    'Cantidad_producto' => $row['Cantidad_producto'],
                    'Id_trabajador' => $row['Id_trabajador'],
                    'Id_reservacion' => $row['Id_reservacion'],
                    'Id_servicio' => $row['Id_servicio'],
                    'Id_promocion' => $row['Id_promocion'],
                    'Administrador_id_administrador' => $row['Administrador_id_administrador'],
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
        $factura = new Factura_cabe();
        $facturas = array();
        $facturas["items"] = array();

        $res = $factura->obtenerfactura_cabe($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                'Id_factura' => $row['Id_factura'],
                'Fecha' => $row['Fecha'],
                'Id_cliente' => $row['Id_cliente'],
                'Monto' => $row['Monto'],
                'Cantidad_producto' => $row['Cantidad_producto'],
                'Id_trabajador' => $row['Id_trabajador'],
                'Id_reservacion' => $row['Id_reservacion'],
                'Id_servicio' => $row['Id_servicio'],
                'Id_promocion' => $row['Id_promocion'],
                'Administrador_id_administrador' => $row['Administrador_id_administrador'],
                'Fecha_registro' => $row['Fecha_registro']
            );
            array_push($facturas["items"], $item);

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