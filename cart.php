<?php
    ob_start();
    session_start();
    //incluyendo el header.php
    include('header.php');

    if(!isset($_SESSION["user"])){
        header("Location:login.php");
    }else{
        $usua = $_SESSION["user"];
        $rol = $_SESSION["rol"];
    }

    //probando
?>

<?php
    
    /* Include cart item si no esta vacio*/
    count($product->getData('carrito')) ? include('Template/_cart-template.php') : include('Template/_cart_notFound.php');   
    /* Include cart item si no esta vacio */

    /* Include Shopping cart wishlist */
    count($product->getData('wishlist')) ? include('Template/_wishlist_template.php') : include('Template/_wishlist_notFound.php');  
    /* Include Shopping cart wishlist */

    /* Include top sale */
    include('Template/_new-games.php');
    /* Include top sale */
   
?>

<?php
    //incluyendo el footer.php
    include('footer.php');
?>