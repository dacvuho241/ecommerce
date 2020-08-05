<?php
//require MySQL connection
require('database/DBController.php');

//product class
require('database/Product.php');

//cart class
require('database/Cart.php');

//DBController Obj
$db = new DBController();

//Product
$product = new Product($db);
//print_r($product->getData('product'));

// Cart Object
$Cart = new Cart($db);
/*$arr = array(
    "user_id"=>1,
    "item_id"=>9
    //these two values are 2 column from database that will pass into insertIntoCart().
);
$Cart->insertIntoCart($arr);*/

