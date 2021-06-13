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

    /* Include blogs */
    include('Template/_blogs.php');
    /* Include blogs */

   
?>

<?php
    //incluyendo el footer.php
    include('footer.php');
?>