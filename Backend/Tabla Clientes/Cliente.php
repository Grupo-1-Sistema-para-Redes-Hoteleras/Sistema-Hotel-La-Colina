<?php

include_once 'Conexión.php';

    class Cliente extends DB{

        public function obtenerclientes(){

            $query = $this->connect()->query('SELECT * FROM cliente');
            return $query; 
        }

        public function obtenercliente($id){
            $query = $this->connect()->prepare('SELECT * FROM cliente WHERE Id_cliente = :id');
            $query->execute(['id' => $id]);
            return $query;
        }

        public function nuevoCliente($cliente){
            $query = $this->connect()->prepare('INSERT INTO cliente (Cedula_cliente,
                                                                        Nombre_cliente,
                                                                        Apellido_cliente,
                                                                        Status,
                                                                        Email_cliente,
                                                                        Telf_cliente,
                                                                        Administrador_id_administrador,
                                                                        Fecha_registro)
                                                                        VALUES (:Cedula_cliente,
                                                                                :Nombre_cliente,
                                                                                :Apellido_cliente,
                                                                                :Status,
                                                                                :Email_cliente,
                                                                                :Telf_cliente,
                                                                                :Administrador_id_administrador,
                                                                                :Fecha_registro)');

            $query->execute(['Cedula_cliente' => $cliente['Cedula_cliente'],
                            'Nombre_cliente' => $cliente['Nombre_cliente'],
                            'Apellido_cliente' => $cliente['Apellido_cliente'],
                            'Status' => $cliente['Status'],
                            'Email_cliente' => $cliente['Email_cliente'],
                            'Telf_cliente' => $cliente['Telf_cliente'],
                            'Administrador_id_administrador' => $cliente['Administrador_id_administrador'],
                            'Fecha_registro' => $cliente['Fecha_registro']]);
            return $query;
        }

        public function actualizarCliente($id, $new){
            $query = $this->connect()->prepare('UPDATE cliente SET Email_cliente = :Email_cliente,
                                                                   Telf_cliente = :Telf_cliente
                                                                   WHERE Id_cliente = :Id_cliente');
            $query->execute(['Id_cliente' => $id['Id_cliente'],
                             'Email_cliente' => $new['Email_cliente'],
                             'Telf_cliente' => $new['Telf_cliente']]);
            return $query;
        }

        public function eliminarCliente($id, $drop){
            $query = $this->connect()->prepare('UPDATE cliente SET Status = :Status WHERE Id_cliente = :Id_cliente');
            $query->execute(['Id_cliente' => $id['Id_cliente'],
                             'Status' => $drop['Status']]);
            return $query;
        }
    }
?>