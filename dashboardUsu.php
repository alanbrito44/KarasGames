<?php
    ob_start();
    session_start();
    //incluyendo el header.php
    include('header.php');

    if(!isset($_SESSION["user"])){
        header("Location:./login.php");
    }
    else if(($rol = $_SESSION["rol"]) != 'ADMINISTRADOR'){
        header("Location:./index.php");
    }else{
        $usua = $_SESSION["user"];
        $rol = $_SESSION["rol"];
    }

?>

<?php

    include('Template/_usuario-Dashboard.php');

?>

<?php
    //incluyendo el footer.php
    include('footer.php');
?>