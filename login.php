<?php
    ob_start();
    session_start();
    //incluyendo el header.php
    include('header.php');

    if(isset($_REQUEST["cerrar"])){
        session_destroy();
        header("Location:login.php");
    }
?>

<?php

    include('Template/_login.php');

?>