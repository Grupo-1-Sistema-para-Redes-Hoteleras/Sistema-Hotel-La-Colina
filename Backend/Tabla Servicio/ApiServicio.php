<?php

include_once 'Servicio.php';

class apiservicio{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $servicio = new Servicio();
        $servicios = array();
        $servicios ["items"] = array();

        $res = $servicio -> obtenerservicios();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'Id_servicio' => $row['Id_servicio'],
                    'Nombre_servicio' => $row['Nombre_servicio'],
                    'Precio_servicio' => $row['Precio_servicio'],
                    'Status' => $row['Status'],
                    'Descripcion' => $row['Descripcion'],
                    'Administrador_id_administrador' => $row['Administrador_id_administrador'],
                    'Fecha_registro' => $row['Fecha_registro']
                );
                array_push($servicios['items'], $item);
            }

            $this->printJSON($servicios);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $servicio = new Servicio();
        $servicios = array();
        $servicios["items"] = array();

        $res = $servicio->obtenerservicio($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'Id_servicio' => $row['Id_servicio'],
                    'Nombre_servicio' => $row['Nombre_servicio'],
                    'Precio_servicio' => $row['Precio_servicio'],
                    'Status' => $row['Status'],
                    'Descripcion' => $row['Descripcion'],
                    'Administrador_id_administrador' => $row['Administrador_id_administrador'],
                    'Fecha_registro' => $row['Fecha_registro']
            );
            array_push($servicios["items"], $item);

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