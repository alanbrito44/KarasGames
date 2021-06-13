<?php
if($_POST["getCombo"]){
    $opciones ="<option value='1'>".'TOP 5 JUEGOS MAS BARATOS'. "</option>";
    $opciones .= "<option value='2'>".'TOP 5 JUEGOS MAS CAROS'. "</option>";
    $opciones .= "<option value='3'>".'JUEGOS DE DISTRIBUIDORA UBISOFT'. "</option>";
    $opciones .= "<option value='4'>".'TOTAL RECAUDADO DE VENTAS POR CATEGORIAS'. "</option>";
    $opciones .= "<option value='5'>".'TOTAL DE VENTAS POR USUARIO'. "</option>";
    echo $opciones;
}
?>