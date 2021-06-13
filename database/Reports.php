<?php
require_once './mpdf/mpdf.php';
class Reports{

    public $db = null;

    public function __construct(DBController $db)
    {
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    public function reporte1($nombre_reporte){
        $sql ="select * from usuario";
        $res = $this->db->con->query($sql);
        $tabla ="<table border='1'><thead><tr><th>CODIGO</th><th>NOMBRE</th><th>CONTRASENA</th><th>EMAIL</th><th>ROL</th></tr></thead><tbody>";
            while($fila = mysqli_fetch_assoc($res)){
                $tabla .= "<tr>";

                $tabla .= "<td>";
                $tabla .= $fila['usuario_id'];
                $tabla .= "</td>";

                $tabla .= "<td>";
                $tabla .= $fila['nombre_usuario'];
                $tabla .= "</td>";

                $tabla .= "<td>";
                $tabla .= $fila['contrasena_usuario'];
                $tabla .= "</td>";

                $tabla .= "<td>";
                $tabla .= $fila['email_usuario'];
                $tabla .= "</td>";

                $tabla .= "<td>";
                $tabla .= $fila['rol_usuario'];
                $tabla .= "</td>";

                $tabla .= "</tr>";
            }
        $tabla .= "</tbody></table>";
        $res->close();

        $reporte = new mPDF('c','A4');
        $logo = "<img src='../img/logo.png' style='width: 200px; height: 75px;'>";
        $encabezado= "<H3>Reporte de productos que tengan existencia minima (de 50 items hacia abajo)</H3><hr>";
        $reporte->WriteHTML($logo);
        $reporte->WriteHTML($encabezado);
        $reporte->WriteHTML($tabla);
        $reporte->Output($nombre_reporte);
    }


}

?>