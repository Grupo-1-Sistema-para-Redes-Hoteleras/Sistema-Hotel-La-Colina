<?php

include_once 'Producto.php';

class apiproducto{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $producto = new Producto();
        $productos = array();

        $res = $producto -> obtenerproductos();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id' => $row['Id_producto'],
                    'name' => $row['Nombre_producto'],
                    'status' => $row['Status'],
                    'description' => $row['Descripcion_producto'],
                    'price' => $row['Precio_producto'],
                    'fecha_registro' => $row['Fecha_registro']
                );
                array_push($productos, $item);
            }

            $this->printJSON($productos);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $producto = new Producto();
        $productos = array();

        $res = $producto->obtenerproducto($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'id' => $row['Id_producto'],
                    'name' => $row['Nombre_producto'],
                    'status' => $row['Status'],
                    'description' => $row['Descripcion_producto'],
                    'price' => $row['Precio_producto'],
                    'fecha_registro' => $row['Fecha_registro']
            );
            array_push($productos, $item);

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
