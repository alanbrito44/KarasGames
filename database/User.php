<?php

class User{

    public $db = null;

    public function __construct(DBController $db)
    {
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    public function autenticar($usuario, $contra){
        $query = "select rol_usuario from usuario where nombre_usuario='$usuario' and contrasena_usuario='$contra'";
        echo $query;
        //ejecutando multiples querys
        $result = $this->db->con->query($query);
        return $result;
    }

    public function insertar($usuario, $contra, $email){
        $query = "INSERT INTO usuario VALUES ('','$usuario','$contra','$email','CLIENTE')";
        echo $query;
        $result = $this->db->con->query($query);
        return $result;
    }

    public function idUsuario($usuario){
        $query = "select usuario_id from usuario where nombre_usuario='$usuario'";
        echo $query;
        //ejecutando multiples querys
        $result = $this->db->con->query($query);
        while ($fila = mysqli_fetch_assoc($result)){
            $id = $fila["usuario_id"];
        }
        return $id;
    }


}

?>