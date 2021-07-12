<?php
//Use to add products from db

class Product
{
public $db =null;
public function __construct(DBController $db)
{
    if(!isset($db->con))return null;
    $this->db=$db;
}

//fetch product data using getData Method
public function GetData($table = 'produs')
{
    $result = $this->db->con->query("SELECT * FROM {$table}");
    $resultArray = array();

    //fetch product data one by one
    while($item = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $resultArray[]=$item;
    }
    return $resultArray;
}

//fetch custom data using getData Method
public function GetCustomData($id_vas, $table = 'produs')
{
    $result = $this->db->con->query("SELECT * FROM {$table} WHERE id_vas={$id_vas}");
    $resultArray = array();

    //fetch product data one by one
    while($item = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $resultArray[]=$item;
    }
    return $resultArray;
}

    // get product using item id
    public function getProduct($item_id = null, $table= 'produs'){
        if (isset($item_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE id_produs={$item_id}");

            $resultArray = array();

            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }
}