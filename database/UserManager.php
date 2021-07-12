<?php
class UserManager
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function addSubscriber($email)
    {
        if (isset($email)) {
            $sql = "insert into abonat(email) values('$email')";
            $result = $this->db->con->query($sql);
            return $result;
        }
    }

    public function addUser($username, $password, $tip_utilizator)
    {
        if (isset($username) && isset($password) && isset($tip_utilizator)) {
            $sql = "insert into utilizator(username,password,tip_utilizator) values('$username','$password','$tip_utilizator')";
            $result = $this->db->con->query($sql);
            return $result;
        }
    }

    public function addClient($id_utilizator, $id_vas, $id_camera, $nume, $cnp, $data_sosire, $data_plecare )
    {
        if (isset($id_utilizator) && isset($id_vas) && isset($id_camera)&& isset($nume) && isset($cnp) && isset($data_sosire) && isset($data_plecare)) {
            $sql = "insert into client(id_utilizator, id_vas, id_camera, nume, cnp, data_sosire, data_plecare ) values('$id_utilizator','$id_vas','$id_camera','$nume','$cnp','$data_sosire','$data_plecare')";
            $result = $this->db->con->query($sql);
            return $result;
        }
    }

    public function addAdmin($id_utilizator, $nume, $functie)
    {
        if (isset($id_utilizator) && isset($nume) && isset($functie)) {
            $sql = "insert into admin(id_utilizator,nume,functie) values('$id_utilizator','$nume','$functie')";
            $result = $this->db->con->query($sql);
            return $result;
        }
    }

    public function addBoat($nume, $capacitate)
    {
        if (isset($nume) && isset($capacitate)) {
            $sql = "insert into vas(nume,capacitate) values('$nume','$capacitate')";
            $result = $this->db->con->query($sql);
            return $result;
        }
    }

    public function addProduct($id_tipserviciu, $id_vas, $nume, $pret, $descriere, $poza)
    {
        if (isset($nume) && isset($id_tipserviciu)&& isset($id_vas)&& isset($pret)&& isset($descriere)&& isset($poza)) {
            $sql = "insert into produs(id_tipserviciu, id_vas, nume, pret, descriere, poza) values('$id_tipserviciu','$id_vas','$nume','$pret','$descriere','$poza')";
            $result = $this->db->con->query($sql);
            return $result;
        }
    }

    public function addFactura($id_user, $subtotal)
    {
        if (isset($id_user) && isset($subtotal)) {
            $sql = "insert into factura(id_client,valoare) values('$id_user','$subtotal')";
            $result = $this->db->con->query($sql);
            return $result;
        }
    }

    // delete cart item using product item id
    public function deleteClient($item_id = null, $table = 'client'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE id_client={$item_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // delete cart item using product item id
    public function deleteAdmin($item_id = null, $table = 'admin'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE id_admin={$item_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // delete cart item using product item id
    public function deleteSubscriber($item_id = null, $table = 'abonat'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE id_abonat={$item_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

        //fetch reservation data using getData Method
    public function GetData($id_user, $table = 'rezervare')
    {
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE id_client = $id_user");
        $resultArray = array();

        //fetch product data one by one
        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $resultArray[]=$item;
        }
        return $resultArray;
    }
    
     //  //fetch reservation limit 10 
    public function GetLimitedData($table = 'rezervare')
    {
        $result = $this->db->con->query("SELECT * FROM {$table} ORDER BY id_rezervare DESC limit 5");
        $resultArray = array();

        //fetch product data one by one
        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $resultArray[]=$item;
        }
        return $resultArray;
    }
}