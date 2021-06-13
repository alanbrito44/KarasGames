<?php
if($_POST["getCombo"]){
    $opciones ="<option value='1'>".'Productos que tengan existencia minima'. "</option>";
    $opciones .= "<option value='2'>".'Top 10 de productos mas vendidos'. "</option>";
    $opciones .= "<option value='3'>".'Top 5 de productos menos vendidos'. "</option>";
    $opciones .= "<option value='4'>".'Productos del proveedor Exotic Liquids'. "</option>";
    $opciones .= "<option value='5'>".'Productos mas caros y los menos vendidos'. "</option>";
    echo $opciones;
}
?>