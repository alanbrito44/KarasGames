<?php
    ob_start();
    session_start();
    //incluyendo el header.php
    include('header.php');
?>

<?php
    /* Include banner area */
    include('Template/_banner-area.php');
    /* Include banner area */

    /* Include top sale */
    include('Template/_top-sale.php');
    /* Include top sale */

    /* Include special price */
    include('Template/_special-price.php');
    /* Include special price */

    /* Include banner add */
    include('Template/_banner-adds.php');
    /* Include banner add */

    /* Include new games */
    include('Template/_new-games.php');
    /* Include new games */

    /* Include blogs */
    include('Template/_blogs.php');
    /* Include blogs */
?>   

<?php
    //incluyendo el footer.php
    include('footer.php');
?>
    