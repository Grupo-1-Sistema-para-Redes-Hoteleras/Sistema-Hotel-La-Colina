<?php

include_once 'Conexión.php';

    class Factura_prov_cabe extends DB{

        public function obtenerfacturas_prov_cabe(){

            $query = $this->connect()->query('SELECT * FROM factura_proveedor_cabe');
            return $query; 
        }

        public function obtenerfactura_prov_cabe($id){
            $query = $this->connect()->prepare('SELECT * FROM factura_proveedor_cabe WHERE Id_factura_proveedor_cabe = :id');
            $query->execute(['id' => $id]);
            return $query;
        }

        public function nuevaFactura_prov_cabe($factura){
            $query = $this->connect()->prepare('INSERT INTO factura_proveedor_cabe (Fecha,
                                                                        Id_proveedor,
                                                                        Monto_total,
                                                                        Cantidad_productos,
                                                                        Id_cargo,
                                                                        Fecha_registro,
                                                                        Administrador_id_administrador)
                                                                        VALUES (:Fecha,
                                                                                :Id_proveedor,
                                                                                :Monto_total,
                                                                                :Cantidad_productos,
                                                                                :Id_cargo,
                                                                                :Fecha_registro,
                                                                                :Administrador_id_administrador)');
            $query->execute(['Fecha' => $factura['Fecha'],
                            'Id_proveedor' => $factura['Id_proveedor'],
                            'Monto_total' => $factura['Monto_total'],
                            'Cantidad_productos' => $factura['Cantidad_productos'],
                            'Id_cargo' => $factura['Id_cargo'],
                            'Fecha_registro' => $factura['Fecha_registro'],
                            'Administrador_id_administrador' => $factura['Administrador_id_administrador']]);
            return $query;
        }
    }
?>