<?php

include_once 'Servicio.php';

class apiservicio{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $servicio = new Servicio();
        $servicios = array();
        
        $res = $servicio -> obtenerservicios();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id' =>              $row['Id_servicio'],
                    'name' =>            $row['Nombre_servicio'],
                    'icono' =>           $row['icono'],
                    'imges' =>           explode(",",$row['imagenes']),
                    'price' =>           $row['Precio_servicio'],
                    'status' =>          $row['Status'],
                    'description' =>     $row['Descripcion'],
                    'id_Admin' =>        $row['Administrador_id_administrador'],
                    'fecha_registro' =>  $row['Fecha_registro']
                );
                array_push($servicios, $item);
            }

            $this->printJSON($servicios);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $servicio = new Servicio();
        $servicios = array();

        $res = $servicio->obtenerservicio($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'id' =>              $row['Id_servicio'],
                    'name' =>            $row['Nombre_servicio'],
                    'icono' =>           $row['icono'],
                    'imges' =>           explode(",",$row['imagenes']),
                    'price' =>           $row['Precio_servicio'],
                    'status' =>          $row['Status'],
                    'description' =>     $row['Descripcion'],
                    'id_Admin' =>        $row['Administrador_id_administrador'],
                    'fecha_registro' =>  $row['Fecha_registro']
            );
            array_push($servicios, $item);

            $this->printJSON($servicios);
        }else{
            $this->error('No hay elementos');
        }
    }

    function AddServicio($item){

        $servicio = new Servicio();

        $res = $servicio->nuevoServicio($item);

        $this->exito('Nuevo Servicio Registrado');

    }

    function ModServicio($id,$item){

        $servicio = new Servicio();

        $res = $servicio->actualizarServicio($id,$item);

        $this->exito('Actualización Exitosa...!');

    }

    function DropServicio($id,$item){

        $servicio = new Servicio();

        $res = $servicio->eliminarServicio($id,$item);

        $this->exito('Eliminación Exitosa');

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
