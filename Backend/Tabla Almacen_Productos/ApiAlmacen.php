<?php

include_once 'Almacen.php';

class apialmacen{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $almacen = new Almacen();
        $almacenes = array();

        $res = $almacen -> obteneralmacenes();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id' => $row['Id_almacen'],
                    'id_product' => $row['Id_producto'],
                    'quantity' => $row['Cantidad_producto'],
                    'status' => $row['Status'],
                    'fecha_registro' => $row['Fecha_registro'],
                    'id_Admin' => $row['Administrador_id_administrador']
                );
                array_push($almacenes, $item);
            }

            $this->printJSON($almacenes);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $almacen = new Almacen();
        $almacenes = array();

        $res = $almacen->obteneralmacen($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'id' => $row['Id_almacen'],
                    'id_product' => $row['Id_producto'],
                    'quantity' => $row['Cantidad_producto'],
                    'status' => $row['Status'],
                    'fecha_registro' => $row['Fecha_registro'],
                    'id_Admin' => $row['Administrador_id_administrador']
            );
            array_push($almacenes, $item);

            $this->printJSON($almacenes);
        }else{
            $this->error('No hay elementos');
        }
    }

    function AddAlmacen($item){

        $almacen = new Almacen();

        $res = $almacen->nuevoAlmacen($item);

        $this->exito('Nuevo Almancen Registrado');

    }

    function ModAlmacen($id, $item){

        $almacen = new Almacen();

        $res = $almacen->actualizarAlmacen($id, $item);

        $this->exito('Actualización Exitosa...!');

    }

    function DropAlmacen($id, $item){

        $almacen = new Almacen();

        $res = $almacen->eliminarAlmacen($id, $item);

        $this->exito('Eliminación Exitosa...!');

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
