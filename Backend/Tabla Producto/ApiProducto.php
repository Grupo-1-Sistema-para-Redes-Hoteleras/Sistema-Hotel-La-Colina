<?php

include_once 'Producto.php';

class apiproducto{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $producto = new Producto();
        $productos = array();
        $productos ["items"] = array();

        $res = $producto -> obtenerproductos();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'Nombre_producto' => $row['Nombre_producto'],
                    'Status' => $row['Status'],
                    'Descripcion_producto' => $row['Descripcion_producto'],
                    'Precio_producto' => $row['Precio_producto'],
                    'Fecha_registro' => $row['Fecha_registro']
                );
                array_push($productos['items'], $item);
            }

            $this->printJSON($productos);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $producto = new Producto();
        $productos = array();
        $productos["items"] = array();

        $res = $producto->obtenerproducto($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'Nombre_producto' => $row['Nombre_producto'],
                    'Status' => $row['Status'],
                    'Descripcion_producto' => $row['Descripcion_producto'],
                    'Precio_producto' => $row['Precio_producto'],
                    'Fecha_registro' => $row['Fecha_registro']
            );
            array_push($productos["items"], $item);

            $this->printJSON($productos);
        }else{
            $this->error('No hay elementos');
        }
    }

    function AddProducto($item){

        $producto = new Producto();

        $res = $producto->nuevoProducto($item);

        $this->exito('Nuevo Producto Registrado');

    }

    function ModProducto($id, $item){

        $producto = new Producto();

        $res = $producto->actualizarProducto($id, $item);

        $this->exito('Actualización Exitosa...!');

    }

    function DropProducto($id, $item){

        $producto = new Producto();

        $res = $producto->eliminarProducto($id, $item);

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