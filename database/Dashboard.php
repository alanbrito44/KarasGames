<?php

class Dashboard{

    public $db = null;

    public function __construct(DBController $db)
    {
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    public function tablaProducto(){
        $query = "select * from productos";
        $result = $this->db->con->query($query);
        $tabla = "
        <table class='table table-dark table-striped text-center'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CODIGO</th>
                    <th>Distribuidora</th>
                    <th>Titulo</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Fecha de registro</th>
                    <th>Codigo caterogira</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>";
        while ($fila = mysqli_fetch_assoc($result)){
            $tabla .= "<tr>";
            $tabla .= "<td>".$fila["juego_id"]."</td>";
            $tabla .= "<td>".$fila["juego_cod"]."</td>";
            $tabla .= "<td>".$fila["juego_distribuidora"]."</td>";
            $tabla .= "<td>".$fila["juego_nombre"]."</td>";
            $tabla .= "<td>".$fila["juego_precio"]."</td>";
            $tabla .= "<td><img src='".$fila["juego_imagen"]."' style='width: 50px; height: 50px;'></td>";
            $tabla .= "<td>".$fila["juego_registro"]."</td>";
            $tabla .= "<td>".$fila["categoria_id"]."</td>";
            $tabla .= "<td><a data-bs-toggle=\"modal\" data-bs-target=\"#staticBackdrop\" class='btn btn-primary'  onclick=\"javascript:cargarMo('".$fila["juego_distribuidora"]."','".$fila["juego_nombre"]."','".$fila["juego_precio"]."','".$fila["juego_imagen"]."','".$fila["juego_registro"]."','".$fila["categoria_id"]."','".$fila["juego_descripcion"]."','".$fila["juego_cod"]."')\">Modificar</a> / ";
            $tabla .= "<a data-bs-toggle=\"modal\" data-bs-target=\"#staticBackdrop\" class='btn btn-primary'  onclick=\"javascript:cargarDel('".$fila["juego_distribuidora"]."','".$fila["juego_nombre"]."','".$fila["juego_precio"]."','".$fila["juego_imagen"]."','".$fila["juego_registro"]."','".$fila["categoria_id"]."','".$fila["juego_descripcion"]."','".$fila["juego_cod"]."')\">Eliminar</a></td>";  
            $tabla .= "</tr>";
        }
        $tabla .= "
            </tbody>
        </table>";
        return $tabla;
    }

    public function getComboCategorias(){
        $query = "select categoria_id, categoria_nombre from categorias";
        $result = $this->db->con->query($query);
        $data = array();
        while($fila = mysqli_fetch_assoc($result)){
            $data[$fila["categoria_id"]]=$fila["categoria_nombre"];
        }
        return $data;
    }

    public function insertar($distribuidora,$titulo,$precio,$imagen,$fecha,$codigoCat,$descripcion,$codigoJue){
        $query ="insert into productos values('NULL','$distribuidora','$titulo','$precio','$imagen','$fecha','$codigoCat','$descripcion','$codigoJue')";
        if($this->db->con->query($query)){
            echo "<script>alert('Ingresado con exito');</script>";
        }else{
            echo "<script>alert('Algo salio mal....');</script>";
        }
    }

    public function modificar($distribuidora,$titulo,$precio,$imagen,$fecha,$codigo,$descripcion,$codigoJue){
        $query ="update productos set juego_distribuidora = '$distribuidora', juego_nombre = '$titulo', juego_precio = '$precio', juego_imagen = '$imagen', juego_registro = '$fecha', categoria_id = '$codigo', juego_descripcion = '$descripcion' where juego_cod = '$codigoJue)' ";
        if($this->db->con->query($query)){
            echo "<script>alert('Cambios realizados con exito');</script>";
        }else{
            echo "<script>alert('Algo salio mal....');</script>";
        }
    }

    public function eliminar($codigoJue){
        $query ="delete from productos where juego_cod = '$codigoJue)' ";
        if($this->db->con->query($query)){
            echo "<script>alert('Eliminacion de juego realizada con exito');</script>";
        }else{
            echo "<script>alert('Algo salio mal....');</script>";
        }
    }

    // FUNCIONES PARA CATEGORIAS //
    public function tablaCategirias(){
        $query = "select * from categorias";
        $result = $this->db->con->query($query);
        $tabla = "
        <table class='table table-dark table-striped text-center'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre categoria</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>";
        while ($fila = mysqli_fetch_assoc($result)){
            $tabla .= "<tr>";
            $tabla .= "<td>".$fila["categoria_id"]."</td>";
            $tabla .= "<td>".$fila["categoria_nombre"]."</td>";
            $tabla .= "<td>".$fila["categoria_desc"]."</td>";
            $tabla .= "<td><a data-bs-toggle=\"modal\" data-bs-target=\"#staticBackdrop\" class='btn btn-primary'  onclick=\"javascript:cargarMo('".$fila["categoria_nombre"]."','".$fila["categoria_desc"]."')\">Modificar</a> / ";
            $tabla .= "<a data-bs-toggle=\"modal\" data-bs-target=\"#staticBackdrop\" class='btn btn-primary'  onclick=\"javascript:cargarDel('".$fila["categoria_nombre"]."','".$fila["categoria_desc"]."')\">Eliminar</a></td>";  
            $tabla .= "</tr>";
        }
        $tabla .= "
            </tbody>
        </table>";
        return $tabla;
    }

    public function insertarCat($nombreCat, $descripcionCat){
        $query ="insert into categorias values('NULL','$nombreCat','$descripcionCat')";
        if($this->db->con->query($query)){
            echo "<script>alert('Categoria nueva ingresada con exito');</script>";
        }else{
            echo "<script>alert('Algo salio mal....');</script>";
        }
    }

    public function modificarCat($nombreCat, $descripcionCat){
        $query ="update categorias set categoria_nombre = '$nombreCat', categoria_nombre = '$descripcionCat' where categoria_nombre = '$descripcionCat'";
        if($this->db->con->query($query)){
            echo "<script>alert('Categoria modifica con exito');</script>";
        }else{
            echo "<script>alert('Algo salio mal....');</script>";
        }
    }

}

?>