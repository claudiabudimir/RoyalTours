<?php
require('database/DBController.php');
require('database/Product.php');
require('database/Cart.php');
require('database/UserManager.php');

//DBConnectroller object
$db = new DBController();
$product = new Product($db);

$Cart = new Cart($db);
$UserManager = new UserManager($db);

//user id for the session
$id =$_SESSION['user']['id_utilizator'];
$sql = "SELECT * FROM client WHERE id_utilizator = $id";
$rs1 = mysqli_query($db->GetConn(),$sql);
$getRow1 = mysqli_fetch_row($rs1);
if (isset($getRow1['0']) && isset($getRow1['2']))
{
    $user_id = $getRow1['0'];
    $id_vas= $getRow1['2'];
    $product_shuffle = $product->GetCustomData($id_vas);//afisam doar produsele disponibile pe vasul in care se afla clientul
}

$sql2 = "SELECT * FROM utilizator ORDER BY id_utilizator DESC limit 1";
$rs2 = mysqli_query($db->GetConn(),$sql2);
$getRow2 = mysqli_fetch_row($rs2);
$new_id = $getRow2['0'];