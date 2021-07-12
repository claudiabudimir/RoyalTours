<?php
class DBController
{
//Database Connerction Properties
protected $host = 'localhost';
protected $user = 'root';
protected $password = '';
protected $database = 'shop2';
//connection property
public $con = null;
//call constructor
public function __construct()
{
$this->con=mysqli_connect($this->host, $this->user, $this->password, $this->database);
if($this->con->connect_error){
    echo "fail".$this->con->connect_error;
}
}

public function __destruct()
{
    $this->closeConnection();
}
// for closing connection
protected function closeConnection(){
    if($this->con!=null)
    {
        $this->con->close();
        $this->con=null;
    }
}

public function getConn()
{
    return $this->con;
}
}
