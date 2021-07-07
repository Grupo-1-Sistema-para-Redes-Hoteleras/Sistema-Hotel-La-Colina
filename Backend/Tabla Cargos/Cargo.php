<?php

include_once 'Conexión.php';

    class Cargo extends DB{

        public function obtenercargos(){

            $query = $this->connect()->query('SELECT * FROM cargo');
            return $query; 
        }

        public function obtenercargo($id){
            $query = $this->connect()->prepare('SELECT * FROM cargo WHERE Id_cargo = :id');
            $query->execute(['id' => $id]);
            return $query;
        }

        public function nuevoCargo($cargo){
            $query = $this->connect()->prepare('INSERT INTO cargo (Nombre_cargo,
                                                                        Status,
                                                                        Fecha_ingreso,
                                                                        Administrador_id_administrador,
                                                                        Fecha_registro)
                                                                        VALUES (:Nombre_cargo,
                                                                                :Status,
                                                                                :Fecha_ingreso,
                                                                                :Administrador_id_administrador,
                                                                                :Fecha_registro)');

            $query->execute(['Nombre_cargo' => $cargo['Nombre_cargo'],
                            'Status' => $cargo['Status'],
                            'Fecha_ingreso' => $cargo['Fecha_ingreso'],
                            'Administrador_id_administrador' => $cargo['Administrador_id_administrador'],
                            'Fecha_registro' => $cargo['Fecha_registro']]);
            return $query;
        }

        public function actualizarCargo($id, $new){
            $query = $this->connect()->prepare('UPDATE cargo SET Nombre_cargo = :Nombre_cargo,
                                                                 Status = :Status
                                                             WHERE Id_cargo = :Id_cargo');
            $query->execute(['Id_cargo' => $id['Id_cargo'],
                             'Nombre_cargo' => $new['Nombre_cargo'],
                             'Status' => $new['Status']]);
            return $query;
        }

        public function eliminarCargo($id, $drop){
            $query = $this->connect()->prepare('UPDATE cargo SET Status = :Status
                                                             WHERE Id_cargo = :Id_cargo');
            $query->execute(['Id_cargo' => $id['Id_cargo'],
                             'Status' => $drop['Status']]);
            return $query;
        }
    }
?>