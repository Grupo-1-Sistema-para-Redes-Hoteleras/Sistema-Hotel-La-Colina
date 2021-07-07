<?php

include_once 'Cargo.php';

class apicargo{

    function getAll(){                       /*FUNCION PARA BUSCAR TODOS*/
        $cargo = new Cargo();
        $cargos = array();
        $cargos ["items"] = array();

        $res = $cargo -> obtenercargos();

        if($res -> rowCount()){

            while($row = $res -> fetch(PDO::FETCH_ASSOC)){
                $item = array(
                    'Id_cargo' => $row['Id_cargo'],
                    'Nombre_cargo' => $row['Nombre_cargo'],
                    'Status' => $row['Status'],
                    'Fecha_ingreso' => $row['Fecha_ingreso'],
                    'Administrador_id_administrador' => $row['Administrador_id_administrador'],
                    'Fecha_registro' => $row['Fecha_registro']
                );
                array_push($cargos['items'], $item);
            }

            $this->printJSON($cargos);

        }else{
            $this->error('No hay elementos Registrados');
        }
    }

    function getById($id){                  /*FUNCION PARA BUSCAR POR ID*/
        $cargo = new Cargo();
        $cargos = array();
        $cargos["items"] = array();

        $res = $cargo->obtenercargo($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    'Id_cargo' => $row['Id_cargo'],
                    'Nombre_cargo' => $row['Nombre_cargo'],
                    'Status' => $row['Status'],
                    'Fecha_ingreso' => $row['Fecha_ingreso'],
                    'Administrador_id_administrador' => $row['Administrador_id_administrador'],
                    'Fecha_registro' => $row['Fecha_registro']
            );
            array_push($cargos["items"], $item);

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