<?php

include_once 'Conexión.php';

    class Administrador extends DB{

        public function obteneradministradores(){

            $query = $this->connect()->query('SELECT * FROM administrador');
            return $query; 
        }

        public function obteneradministrador($id){
            $query = $this->connect()->prepare('SELECT * FROM administrador WHERE Id_administrador = :id');
            $query->execute(['id' => $id]);
            return $query;
        }

        public function nuevoAdministrador($admin){
            $query = $this->connect()->prepare('INSERT INTO administrador (Id_administrador,
                                                                        Nombre_administrador,
                                                                        Usuario_administrador,
                                                                        Password_administrador,
                                                                        Status_administrador,
                                                                        Fecha,
                                                                        Nivel_administrador)
                                                                        VALUES (:Id_administrador,
                                                                                :Nombre_administrador,
                                                                                :Usuario_administrador,
                                                                                :Password_administrador,
                                                                                :Status_administrador,
                                                                                :Fecha,
                                                                                :Nivel_administrador)');
            $query->execute(['Id_administrador' => $admin['Id_administrador'],
                            'Nombre_administrador' => $admin['Nombre_administrador'],
                            'Usuario_administrador' => $admin['Usuario_administrador'],
                            'Password_administrador' => $admin['Password_administrador'],
                            'Status_administrador' => $admin['Status_administrador'],
                            'Fecha' => $admin['Fecha'],
                            'Nivel_administrador' => $admin['Nivel_administrador']]);
            return $query;
        }

        public function actualizarAdministrador($id, $new){
            $query = $this->connect()->prepare('UPDATE administrador SET Nombre_administrador = :Nombre_administrador,
                                                                         Usuario_administrador = :Usuario_administrador,
                                                                         Password_administrador = :Password_administrador,
                                                                         Nivel_administrador = :Nivel_administrador
                                                                     WHERE Id_administrador = :Id_administrador');
            $query->execute(['Id_administrador' => $id['Id_administrador'],
                             'Nombre_administrador' => $new['Nombre_administrador'],
                             'Usuario_administrador' => $new['Usuario_administrador'],
                             'Password_administrador' => $new['Password_administrador'],
                             'Nivel_administrador' => $new['Nivel_administrador']]);
            return $query;
        }

        public function eliminarAdministrador($id, $drop){
            $query = $this->connect()->prepare('UPDATE administrador SET Status_administrador = :Status_administrador
                                                                     WHERE Id_administrador = :Id_administrador');
            $query->execute(['Id_administrador' => $id['Id_administrador'],
                             'Status_administrador' => $drop['Status_administrador']]);
            return $query;
        }
    }
?>