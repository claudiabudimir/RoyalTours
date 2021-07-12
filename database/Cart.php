<?php

// php cart class
class Cart
{
    public $db = null;
    public $user_id = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
        
        $id =$_SESSION['user']['id_utilizator'];
        $sql = "SELECT * FROM client WHERE id_utilizator = $id";

        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';

        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'shop2');
        $rs1 = mysqli_query($conn,$sql);
        $getRow1 = mysqli_fetch_row($rs1);
        if (isset($getRow1['0']))
        {
            $this->user_id = $getRow1['0'];
        }

    }

    // insert into cart table
    public  function insertIntoCart($params = null, $table = "rezervare"){
        if ($this->db->con != null){
            if ($params != null){
                // "Insert into cart(user_id) values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',' , array_values($params));

                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // to get user_id and item_id and insert into cart table
    public  function addToCartOld($userid, $itemid, $data_rezervare, $nr_persoane){
        if (isset($userid) && isset($itemid)){
            $params = array(
                "id_client" => $userid,
                "id_produs" => $itemid,
                "data_rezervare" => $data_rezervare,
                "nr_persoane"=> $nr_persoane
            );

            // insert data into cart
            $result = $this->insertIntoCart($params);
            if ($result){
                // Reload Page
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }

    public  function addToCart($userid, $itemid, $nr_persoane, $cost)
    {
        if (isset($userid) && isset($itemid) && isset($nr_persoane) && isset($cost)) {
            $date = date('Y-m-d H:i:s');
            $sql = "insert into rezervare(id_client, id_produs, data_rezervare, nr_persoane, cost) 
            values('$userid','$itemid','$date','$nr_persoane','$cost')";
            $result = $this->db->con->query($sql);
            return $result;
        }
    }

    // delete cart item using product item id
    public function deleteCart($item_id = null, $table = 'rezervare'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE id_produs={$item_id} AND id_client = {$this->user_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

        // delete cart item using product item id
        public function updateCart($item_id = null, $item = null, $table = 'rezervare'){
            if ($this->user_id)
            {
            
            $sql = "SELECT * FROM produs WHERE id_produs = $item_id";

            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
    
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'shop2');
            $rs1 = mysqli_query($conn,$sql);
            $getRow1 = mysqli_fetch_row($rs1);
            $pret = 0;
            if (isset($getRow1['4']))
            {
                $pret = $getRow1['4'];
            }
                
            if($item != null && $item_id != null){
                $cost = $pret * $item;
                $result = $this->db->con->query("UPDATE {$table} SET nr_persoane={$item} , cost = {$cost} WHERE id_produs={$item_id} AND id_client = {$this->user_id}");
                if($result){
                    header("Location:" . $_SERVER['PHP_SELF']);
                }
                return $result;
            }
            }
        }

        // delete cart item using reservation item id
        public function deleteReservation($item_id = null, $table = 'rezervare'){
            if($item_id != null){
                $result = $this->db->con->query("DELETE FROM {$table} WHERE id_rezervare={$item_id}");
                if($result){
                    header("Location:" . $_SERVER['PHP_SELF']);
                }
                return $result;
            }
        }

    // calculate sub total
    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f' , $sum);
        }
    }

    // get item_it of shopping cart list
    public function getCartId($cartArray = null, $key = "id_produs"){
        if ($cartArray != null){
            $cart_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }
}