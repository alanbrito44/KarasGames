<?php

require('../database/DBController.php');
$db = new DBController();
require('../database/Product.php');
$product = new Product($db);

if(isset($_POST['itemid'])){
    $result = $product->getProduct($_POST['itemid']);
    echo json_encode($result);
}

?>