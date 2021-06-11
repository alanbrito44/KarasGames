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

    /* Include special price */
    include('Template/_special-price.php');
    /* Include special price */

?>

<?php
    //incluyendo el footer.php
    include('footer.php');
?>