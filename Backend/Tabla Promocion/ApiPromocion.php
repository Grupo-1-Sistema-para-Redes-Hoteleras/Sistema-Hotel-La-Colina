<?php

include_once 'Promocion.php';

class apipromocion{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $promocion = new Promocion();
        $promociones = array();

        $res = $promocion -> obtenerpromociones();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id' => $row['Id_promocion'],
                    'name' => $row['Nombre_promocion'],
                    'fecha_i' => $row['Fecha_inicio'],
                    'fecha_f' => $row['Fecha_final'],
                    'discount' => $row['Descuento'],
                    'status' => $row['Status'],
                    'id_room_type' => $row['Id_tipo_habitacion'],
                    'fecha_registro' => $row['Fecha_registro']
                );
                array_push($promociones, $item);
            }

            $this->printJSON($promociones);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $promocion = new Promocion();
        $promociones = array();

        $res = $promocion->obtenerpromocion($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'id' => $row['Id_promocion'],
                    'name' => $row['Nombre_promocion'],
                    'fecha_i' => $row['Fecha_inicio'],
                    'fecha_f' => $row['Fecha_final'],
                    'discount' => $row['Descuento'],
                    'status' => $row['Status'],
                    'id_room_type' => $row['Id_tipo_habitacion'],
                    'fecha_registro' => $row['Fecha_registro']
            );
            array_push($promociones, $item);

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
