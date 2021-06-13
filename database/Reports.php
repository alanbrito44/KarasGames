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
        $sql ="SELECT juego_id, juego_nombre, juego_precio FROM productos ORDER BY juego_precio asc LIMIT 5;";
        $res = $this->db->con->query($sql);
        $tabla ="<table border='1'><thead><tr><th>CODIGO</th><th>NOMBRE</th><th>PRECIO</th></tr></thead><tbody>";
            while($fila = mysqli_fetch_assoc($res)){
                $tabla .= "<tr>";

                $tabla .= "<td>";
                $tabla .= $fila['juego_id'];
                $tabla .= "</td>";

                $tabla .= "<td>";
                $tabla .= $fila['juego_nombre'];
                $tabla .= "</td>";

                $tabla .= "<td>";
                $tabla .= $fila['juego_precio'];
                $tabla .= "</td>";

                $tabla .= "</tr>";
            }
        $tabla .= "</tbody></table>";
        $res->close();

        $reporte = new mPDF('c','A4');
        $logo = "<img src='../img/logo.png' style='width: 200px; height: 75px;'>";
        $encabezado= "<H3>TOP 5 JUEGOS MAS BARATOS</H3><hr>";
        $reporte->WriteHTML($logo);
        $reporte->WriteHTML($encabezado);
        $reporte->WriteHTML($tabla);
        $reporte->Output($nombre_reporte);
    }

    public function reporte2($nombre_reporte){
        $sql ="SELECT juego_id, juego_nombre, juego_precio FROM productos ORDER BY juego_precio DESC LIMIT 5;";
        $res = $this->db->con->query($sql);
        $tabla ="<table border='1'><thead><tr><th>CODIGO</th><th>NOMBRE</th><th>PRECIO</th></tr></thead><tbody>";
            while($fila = mysqli_fetch_assoc($res)){
                $tabla .= "<tr>";

                $tabla .= "<td>";
                $tabla .= $fila['juego_id'];
                $tabla .= "</td>";

                $tabla .= "<td>";
                $tabla .= $fila['juego_nombre'];
                $tabla .= "</td>";

                $tabla .= "<td>";
                $tabla .= $fila['juego_precio'];
                $tabla .= "</td>";

                $tabla .= "</tr>";
            }
        $tabla .= "</tbody></table>";
        $res->close();

        $reporte = new mPDF('c','A4');
        $logo = "<img src='../img/logo.png' style='width: 200px; height: 75px;'>";
        $encabezado= "<H3>TOP 5 JUEGOS MAS CAROS</H3><hr>";
        $reporte->WriteHTML($logo);
        $reporte->WriteHTML($encabezado);
        $reporte->WriteHTML($tabla);
        $reporte->Output($nombre_reporte);
    }

    public function reporte3($nombre_reporte){
        $sql ="SELECT * FROM productos WHERE juego_distribuidora LIKE '%ubisoft%';";
        $res = $this->db->con->query($sql);
        $tabla ="<table border='1'><thead><tr><th>CODIGO</th><th>DISTRIBUIDORA</th><th>NOMBRE</th><th>PRECIO</th><th>CATEGORIA</th></tr></thead><tbody>";
            while($fila = mysqli_fetch_assoc($res)){
                $tabla .= "<tr>";

                $tabla .= "<td>";
                $tabla .= $fila['juego_id'];
                $tabla .= "</td>";

                $tabla .= "<td>";
                $tabla .= $fila['juego_distribuidora'];
                $tabla .= "</td>";

                $tabla .= "<td>";
                $tabla .= $fila['juego_nombre'];
                $tabla .= "</td>";

                $tabla .= "<td>";
                $tabla .= $fila['juego_precio'];
                $tabla .= "</td>";

                $tabla .= "<td>";
                $tabla .= $fila['categoria_id'];
                $tabla .= "</td>";

                $tabla .= "</tr>";
            }
        $tabla .= "</tbody></table>";
        $res->close();

        $reporte = new mPDF('c','A4');
        $logo = "<img src='../img/logo.png' style='width: 200px; height: 75px;'>";
        $encabezado= "<H3>TOP 5 JUEGOS MAS CAROS</H3><hr>";
        $reporte->WriteHTML($logo);
        $reporte->WriteHTML($encabezado);
        $reporte->WriteHTML($tabla);
        $reporte->Output($nombre_reporte);
    }



}

?>