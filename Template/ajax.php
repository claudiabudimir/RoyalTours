<?php
//folosit pentru a incrementa/decrementa numarul de rezervari

// require MySQL Connection
require ('../database/DBController.php');

// require Product Class
require ('../database/home_product.php');

// DBController object
$db = new DBController();

// Product object
$product = new Product($db);

if (isset($_POST['itemid'])){
    $result = $product->getProduct($_POST['itemid']);
    echo json_encode($result);
}