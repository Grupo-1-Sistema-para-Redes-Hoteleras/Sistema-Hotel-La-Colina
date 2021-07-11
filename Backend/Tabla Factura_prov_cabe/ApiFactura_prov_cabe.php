<?php

include_once 'Factura_prov_cabe.php';

class apifacturas_prov_cabe{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $factura = new Factura_prov_cabe();
        $facturas = array();

        $res = $factura -> obtenerfacturas_prov_cabe();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id' => $row['Id_factura_proveedor_cabe'],
                    'fecha' => $row['Fecha'],
                    'id_supplier' => $row['Id_proveedor'],
                    'amount' => $row['Monto_total'],
                    'quantity' => $row['Cantidad_productos'],
                    'id_position' => $row['Id_cargo'],
                    'fecha_registro' => $row['Fecha_registro'],
                    'id_Admin' => $row['Administrador_id_administrador']
                );
                array_push($facturas, $item);
            }

            $this->printJSON($facturas);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $factura = new Factura_prov_cabe();
        $facturas = array();

        $res = $factura->obtenerfactura_prov_cabe($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'id' => $row['Id_factura_proveedor_cabe'],
                    'fecha' => $row['Fecha'],
                    'id_supplier' => $row['Id_proveedor'],
                    'amount' => $row['Monto_total'],
                    'quantity' => $row['Cantidad_productos'],
                    'id_position' => $row['Id_cargo'],
                    'fecha_registro' => $row['Fecha_registro'],
                    'id_Admin' => $row['Administrador_id_administrador']
            );
            array_push($facturas, $item);

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
