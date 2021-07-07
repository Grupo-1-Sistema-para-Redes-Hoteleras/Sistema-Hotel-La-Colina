<?php

include_once 'Conexión.php';

class Habitacion extends DB{

    public function obtenerHabitaciones(){

        $query = $this->connect()->query('SELECT * FROM habitacion');
        return $query; 
    }

    function obtenerHabitacion($id){
        $query = $this->connect()->prepare('SELECT * FROM habitacion WHERE Id_habitacion = :id');
        $query->execute(['id' => $id]);
        return $query;
    }

    function nuevaHabitacion($habitacion){
        $query = $this->connect()->prepare('INSERT INTO habitacion (Id_tipo_habitacion,
                                                                    Precio_habitacion,
                                                                    Status,
                                                                    Numero_habitacion,
                                                                    Descripcion,
                                                                    Fecha_registro,
                                                                    Administrador_id_administrador)
                                                                    VALUES (:Id_tipo_habitacion,
                                                                            :Precio_habitacion,
                                                                            :Status,
                                                                            :Numero_habitacion,
                                                                            :Descripcion,
                                                                            :Fecha_registro,
                                                                            :Administrador_id_administrador)');

        $query->execute(['Id_tipo_habitacion' => $habitacion['Id_tipo_habitacion'],
                         'Precio_habitacion' => $habitacion['Precio_habitacion'],
                         'Status' => $habitacion['Status'],
                         'Numero_habitacion' => $habitacion['Numero_habitacion'],
                         'Descripcion' => $habitacion['Descripcion'],
                         'Fecha_registro' => $habitacion['Fecha_registro'],
                         'Administrador_id_administrador' => $habitacion['Administrador_id_administrador']]);
        return $query;
    }

    function actualizarHabitacion($id, $new){
        $query = $this->connect()->prepare('UPDATE habitacion SET Precio_habitacion = :Precio_habitacion,
                                                                  Status = :Status,
                                                                  Descripcion = :Descripcion 
                                                              WHERE Id_habitacion = :Id_habitacion');
        $query->execute(['Id_habitacion' => $id['Id_habitacion'],
                         'Precio_habitacion' => $new['Precio_habitacion'],
                         'Status' => $new['Status'],
                         'Descripcion' => $new['Descripcion']]);
        return $query;
    }

    function eliminarhabitacion($id, $drop){
        $query = $this->connect()->prepare('UPDATE habitacion SET Status = :Status WHERE Id_habitacion = :Id_habitacion');
        $query->execute(['Id_habitacion' => $id['Id_habitacion'],
                         'Status' => $drop['Status']]);
        return $query;
    }

}

?>