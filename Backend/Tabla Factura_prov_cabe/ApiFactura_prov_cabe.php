<?php

include_once 'Factura_prov_cabe.php';

class apifacturas_prov_cabe{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $factura = new Factura_prov_cabe();
        $facturas = array();
        $facturas ["items"] = array();

        $res = $factura -> obtenerfacturas_prov_cabe();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'Id_factura_proveedor_cabe' => $row['Id_factura_proveedor_cabe'],
                    'Fecha' => $row['Fecha'],
                    'Id_proveedor' => $row['Id_proveedor'],
                    'Monto_total' => $row['Monto_total'],
                    'Cantidad_productos' => $row['Cantidad_productos'],
                    'Id_cargo' => $row['Id_cargo'],
                    'Fecha_registro' => $row['Fecha_registro'],
                    'Administrador_id_administrador' => $row['Administrador_id_administrador']
                );
                array_push($facturas['items'], $item);
            }

            $this->printJSON($facturas);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $factura = new Factura_prov_cabe();
        $facturas = array();
        $facturas["items"] = array();

        $res = $factura->obtenerfactura_prov_cabe($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                'Id_factura_proveedor_cabe' => $row['Id_factura_proveedor_cabe'],
                'Fecha' => $row['Fecha'],
                'Id_proveedor' => $row['Id_proveedor'],
                'Monto_total' => $row['Monto_total'],
                'Cantidad_productos' => $row['Cantidad_productos'],
                'Id_cargo' => $row['Id_cargo'],
                'Fecha_registro' => $row['Fecha_registro'],
                'Administrador_id_administrador' => $row['Administrador_id_administrador']
            );
            array_push($facturas["items"], $item);

            $this->printJSON($facturas);
        }else{
            $this->error('No hay elementos');
        }
    }

    function AddFactura_prov_cabe($item){

        $factura = new Factura_prov_cabe();

        $res = $factura->nuevaFactura_prov_cabe($item);

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