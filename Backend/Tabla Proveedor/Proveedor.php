<?php

include_once 'Conexión.php';

    class Proveedor extends DB{

        public function obtenerproveedores(){

            $query = $this->connect()->query('SELECT * FROM proveedor');
            return $query; 
        }

        public function obtenerproveedor($id){
            $query = $this->connect()->prepare('SELECT * FROM proveedor WHERE Id_proveedor = :id');
            $query->execute(['id' => $id]);
            return $query;
        }

        public function nuevoProveedor($proveedor){
            $query = $this->connect()->prepare('INSERT INTO proveedor ( Nombre_proveedor,
                                                                        Apellido_proveedor,
                                                                        Status,
                                                                        Email_proveedor,
                                                                        Telf_proveedor,
                                                                        Direccion_proveedor,
                                                                        Fecha_registro,
                                                                        Administrador_id_administrador)
                                                                        VALUES (:Nombre_proveedor,
                                                                                :Apellido_proveedor,
                                                                                :Status,
                                                                                :Email_proveedor,
                                                                                :Telf_proveedor,
                                                                                :Direccion_proveedor,
                                                                                :Fecha_registro,
                                                                                :Administrador_id_administrador)');

            $query->execute(['Nombre_proveedor' => $proveedor['Nombre_proveedor'],
                            'Apellido_proveedor' => $proveedor['Apellido_proveedor'],
                            'Status' => $proveedor['Status'],
                            'Email_proveedor' => $proveedor['Email_proveedor'],
                            'Telf_proveedor' => $proveedor['Telf_proveedor'],
                            'Direccion_proveedor' => $proveedor['Direccion_proveedor'],
                            'Fecha_registro' => $proveedor['Fecha_registro'],
                            'Administrador_id_administrador' => $proveedor['Administrador_id_administrador']]);
            return $query;
        }

        public function actualizarProveedor($id,$new){
            $query = $this->connect()->prepare('UPDATE proveedor SET Email_proveedor = :Email_proveedor,
                                                                    Telf_proveedor = :Telf_proveedor,
                                                                    Direccion_proveedor = :Direccion_proveedor
                                                                 WHERE Id_proveedor = :Id_proveedor');
            $query->execute(['Id_proveedor' => $id['Id_proveedor'],
                             'Email_proveedor' => $new['Email_proveedor'],
                             'Telf_proveedor' => $new['Telf_proveedor'],
                             'Direccion_proveedor' => $new['Direccion_proveedor']]);
            return $query;
        }

        public function eliminarProveedor($id,$drop){
            $query = $this->connect()->prepare('UPDATE proveedor SET Status = :Status WHERE Id_proveedor = :Id_proveedor');
            $query->execute(['Id_proveedor' => $id['Id_proveedor'],
                             'Status' => $drop['Status']]);
            return $query;
        }
    }
?>