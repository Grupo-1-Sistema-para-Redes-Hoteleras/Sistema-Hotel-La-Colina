<?php

include_once 'Tipo_Habitacion.php';

class apitipohabitacion{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $tipo = new TipoHabitacion();
        $tipos = array();

        $res = $tipo -> obtenertipohabitaciones();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id' => $row['id_tipo_habitacion'],
                    'name' => $row['nombre_tipo'],
                    'status' => $row['status'],
                    'price' => $row['precio_prom'],
                    'description' => $row['descripcion'],
                    'imges' => explode(",",$row['imagenes']),
                    'fecha_registro' => $row['fecha_registro'],
                );
                array_push($tipos, $item);
            }

            $this->printJSON($tipos);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $tipo = new TipoHabitacion();
        $tipos = array();

        $res = $tipo->obtenertipohabitacion($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'id' => $row['id_tipo_habitacion'],
                    'name' => $row['nombre_tipo'],
                    'status' => $row['status'],
                    'price' => $row['precio_prom'],
                    'description' => $row['descripcion'],
                    'imges' => explode(",",$row['imagenes']),
                    'fecha_registro' => $row['fecha_registro'],
            );
            array_push($tipos, $item);

            $this->printJSON($tipos);
        }else{
            $this->error('No hay elementos');
        }
    }

    function AddTipoHabitacion($item){

        $tipo = new TipoHabitacion();

        $res = $tipo->nuevoTipoHabitacion($item);

        $this->exito('Nuevo Tipo de Habitación Registrado');

    }

    function ModTipoHabitacion($id,$item){

        $tipo = new TipoHabitacion();

        $res = $tipo->actualizarTipoHabitacion($id,$item);

        $this->exito('Actualización Exitosa...!');

    }

    function DropTipoHabitacion($id,$item){

        $tipo = new TipoHabitacion();

        $res = $tipo->eliminarTipoHabitacion($id,$item);

        $this->exito('Eliminación Exitosa');

    }

    function error($mensaje){
        echo  json_encode(array('mensaje' => $mensaje)) ; 
    }

    function exito($mensaje){
        echo  json_encode(array('mensaje' => $mensaje)) ;
    }

    function printJSON($array){
        echo json_encode($array);
    }
}
    
?>
