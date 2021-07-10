<?php

include_once 'Cargo.php';

class apicargo{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $cargo = new Cargo();
        $cargos = array();

        $res = $cargo -> obtenercargos();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'id' => $row['Id_cargo'],
                    'name' => $row['Nombre_cargo'],
                    'status' => $row['Status'],
                    'fecha' => $row['Fecha_ingreso'],
                    'id_Admin' => $row['Administrador_id_administrador'],
                    'fecha_registro' => $row['Fecha_registro']
                );
                array_push($cargos, $item);
            }

            $this->printJSON($cargos);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $cargo = new Cargo();
        $cargos = array();

        $res = $cargo->obtenercargo($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'id' => $row['Id_cargo'],
                    'name' => $row['Nombre_cargo'],
                    'status' => $row['Status'],
                    'fecha' => $row['Fecha_ingreso'],
                    'id_Admin' => $row['Administrador_id_administrador'],
                    'fecha_registro' => $row['Fecha_registro']
            );
            array_push($cargos, $item);

            $this->printJSON($cargos);
        }else{
            $this->error('No hay elementos');
        }
    }

    function AddCargo($item){

        $cargo = new Cargo();

        $res = $cargo->nuevoCargo($item);

        $this->exito('Nuevo Cargo Registrado');

    }

    function ModCargo($id, $item){

        $cargo = new Cargo();

        $res = $cargo->actualizarCargo($id, $item);

        $this->exito('Actualización Exitosa...!');

    }

    function DropCargo($id, $item){

        $cargo = new Cargo();

        $res = $cargo->eliminarCargo($id, $item);

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
