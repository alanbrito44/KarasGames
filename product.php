<?php
    ob_start();
    session_start();
    //incluyendo el header.php
    include('header.php');
?>

<?php
    
    /* Include products */
    include('Template/_products.php');
    /* Include products */

    /* Include top sale */
    include('Template/_top-sale.php');
    /* Include top sale */

   
?>

<?php
    //incluyendo el footer.php
    include('footer.php');
?>