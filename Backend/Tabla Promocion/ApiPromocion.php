<?php

include_once 'Promocion.php';

class apipromocion{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $promocion = new Promocion();
        $promociones = array();
        $promociones ["items"] = array();

        $res = $promocion -> obtenerpromociones();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'Id_promocion' => $row['Id_promocion'],
                    'Nombre_promocion' => $row['Nombre_promocion'],
                    'Fecha_inicio' => $row['Fecha_inicio'],
                    'Fecha_final' => $row['Fecha_final'],
                    'Descuento' => $row['Descuento'],
                    'Status' => $row['Status'],
                    'Id_tipo_habitacion' => $row['Id_tipo_habitacion'],
                    'Fecha_registro' => $row['Fecha_registro']
                );
                array_push($promociones['items'], $item);
            }

            $this->printJSON($promociones);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $promocion = new Promocion();
        $promociones = array();
        $promociones["items"] = array();

        $res = $promocion->obtenerpromocion($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'Id_promocion' => $row['Id_promocion'],
                    'Nombre_promocion' => $row['Nombre_promocion'],
                    'Fecha_inicio' => $row['Fecha_inicio'],
                    'Fecha_final' => $row['Fecha_final'],
                    'Descuento' => $row['Descuento'],
                    'Status' => $row['Status'],
                    'Id_tipo_habitacion' => $row['Id_tipo_habitacion'],
                    'Fecha_registro' => $row['Fecha_registro']
            );
            array_push($promociones["items"], $item);

            $this->printJSON($promociones);
        }else{
            $this->error('No hay elementos');
        }
    }

    function AddPromocion($item){

        $promocion = new Promocion();

        $res = $promocion->nuevaPromocion($item);

        $this->exito('Nueva Promocion Registrada');

    }

    function ModPromocion($id,$item){

        $promocion = new Promocion();

        $res = $promocion->actualizarPromocion($id,$item);

        $this->exito('Actualización Exitosa...!');

    }

    function DropPromocion($id,$item){

        $promocion = new Promocion();

        $res = $promocion->eliminarPromocion($id,$item);

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