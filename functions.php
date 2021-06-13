<?php
//require MySQL Connection
require('database/DBController.php');

//require Product Class
require('database/Product.php');

//require Cart Class
require('database/Cart.php');

//require User Class
require('database/User.php');

//require Dashboard class
require('database/Dashboard.php');

//DBController object
$db = new DBController();
//Product object
$product = new Product($db);
$product_shuffle = $product->getData();
//Carrito object
$cart = new Cart($db);
$usur = new User($db);
//Dashboard object
$dash = new Dashboard($db);

?>