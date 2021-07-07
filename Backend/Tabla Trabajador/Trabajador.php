<?php

include_once 'Conexión.php';

    class Trabajador extends DB{

        public function obtenertrabajadores(){

            $query = $this->connect()->query('SELECT * FROM trabajador');
            return $query; 
        }

        public function obtenertrabajador($id){
            $query = $this->connect()->prepare('SELECT * FROM trabajador WHERE Id_trabajador = :id');
            $query->execute(['id' => $id]);
            return $query;
        }

        public function nuevoTrabajador($trabajador){
            $query = $this->connect()->prepare('INSERT INTO trabajador (Id_cargo,
                                                                        Cedula_trabajador,
                                                                        Nombre_trabajador,
                                                                        Apellido_trabajador,
                                                                        Status_trabajador,
                                                                        Email_trabajador,
                                                                        Telf_trabajador,
                                                                        Fecha_nacimiento,
                                                                        Id_administrador,
                                                                        Administrador_id_administrador,
                                                                        Fecha_registro)
                                                                        VALUES (:Id_cargo,
                                                                                :Cedula_trabajador,
                                                                                :Nombre_trabajador,
                                                                                :Apellido_trabajador,
                                                                                :Status_trabajador,
                                                                                :Email_trabajador,
                                                                                :Telf_trabajador,
                                                                                :Fecha_nacimiento,
                                                                                :Id_administrador,
                                                                                :Administrador_id_administrador,
                                                                                :Fecha_registro)');

            $query->execute(['Id_cargo' => $trabajador['Id_cargo'],
                            'Cedula_trabajador' => $trabajador['Cedula_trabajador'],
                            'Nombre_trabajador' => $trabajador['Nombre_trabajador'],
                            'Apellido_trabajador' => $trabajador['Apellido_trabajador'],
                            'Status_trabajador' => $trabajador['Status_trabajador'],
                            'Email_trabajador' => $trabajador['Email_trabajador'],
                            'Telf_trabajador' => $trabajador['Telf_trabajador'],
                            'Fecha_nacimiento' => $trabajador['Fecha_nacimiento'],
                            'Id_administrador' => $trabajador['Id_administrador'],
                            'Administrador_id_administrador' => $trabajador['Administrador_id_administrador'],
                            'Fecha_registro' => $trabajador['Fecha_registro']]);
            return $query;
        }

        public function actualizarTrabajador($id, $new){
            $query = $this->connect()->prepare('UPDATE trabajador SET Id_cargo = :Id_cargo,
                                                                      Status_trabajador = :Status_trabajador,
                                                                      Email_trabajador = :Email_trabajador,
                                                                      Telf_trabajador = :Telf_trabajador
                                                                  WHERE Id_trabajador = :Id_trabajador');
            $query->execute(['Id_trabajador' => $id['Id_trabajador'],
                             'Id_cargo' => $new['Id_cargo'],
                             'Status_trabajador' => $new['Status_trabajador'],
                             'Email_trabajador' => $new['Email_trabajador'],
                             'Telf_trabajador' => $new['Telf_trabajador']]);
            return $query;
        }

        public function eliminarTrabajador($id,$drop){
            $query = $this->connect()->prepare('UPDATE trabajador SET Status_trabajador = :Status_trabajador WHERE Id_trabajador = :Id_trabajador');
            $query->execute(['Id_trabajador' => $id['Id_trabajador'],
                             'Status_trabajador' => $drop['Status_trabajador']]);
            return $query;
        }
    }

?>