<?php

include_once 'Factura_prov_cuerpo.php';

class apifacturas_prov_cuerpo{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $factura = new Factura_prov_cuerpo();
        $facturas = array();
        $facturas ["items"] = array();

        $res = $factura -> obtenerfacturas_prov_cuerpo();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'Id_factura_proveedor_cuerpo' => $row['Id_factura_proveedor_cuerpo'],
                    'Id_factura_proveedor_cabe' => $row['Id_factura_proveedor_cabe'],
                    'Id_producto' => $row['Id_producto'],
                    'Cantidad_producto' => $row['Cantidad_producto'],
                    'Monto' => $row['Monto'],
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
        $factura = new Factura_prov_cuerpo();
        $facturas = array();
        $facturas["items"] = array();

        $res = $factura->obtenerfactura_prov_cuerpo($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                'Id_factura_proveedor_cuerpo' => $row['Id_factura_proveedor_cuerpo'],
                    'Id_factura_proveedor_cabe' => $row['Id_factura_proveedor_cabe'],
                    'Id_producto' => $row['Id_producto'],
                    'Cantidad_producto' => $row['Cantidad_producto'],
                    'Monto' => $row['Monto'],
                    'Fecha_registro' => $row['Fecha_registro']
            );
            array_push($facturas["items"], $item);

            $this->printJSON($facturas);
        }else{
            $this->error('No hay elementos');
        }
    }

    function AddFactura_prov_cuerpo($item){

        $factura = new Factura_prov_cuerpo();

        $res = $factura->nuevaFactura_prov_cuerpo($item);

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