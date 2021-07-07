<?php

include_once 'Almacen.php';

class apialmacen{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $almacen = new Almacen();
        $almacenes = array();
        $almacenes ["items"] = array();

        $res = $almacen -> obteneralmacenes();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'Id_almacen' => $row['Id_almacen'],
                    'Id_producto' => $row['Id_producto'],
                    'Cantidad_producto' => $row['Cantidad_producto'],
                    'Status' => $row['Status'],
                    'Fecha_registro' => $row['Fecha_registro'],
                    'Administrador_id_administrador' => $row['Administrador_id_administrador']
                );
                array_push($almacenes['items'], $item);
            }

            $this->printJSON($almacenes);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $almacen = new Almacen();
        $almacenes = array();
        $almacenes["items"] = array();

        $res = $almacen->obteneralmacen($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'Id_almacen' => $row['Id_almacen'],
                    'Id_producto' => $row['Id_producto'],
                    'Cantidad_producto' => $row['Cantidad_producto'],
                    'Status' => $row['Status'],
                    'Fecha_registro' => $row['Fecha_registro'],
                    'Administrador_id_administrador' => $row['Administrador_id_administrador']
            );
            array_push($almacenes["items"], $item);

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