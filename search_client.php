<?php
ob_start();
include('header_admin.php');
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        $deletedrecord = $UserManager->deleteClient($_POST['item_id']);
    }
}
?>
<h2>Detalii Rezervări Client</h2>
<br><br><br>
<form action="" method="post">
    <div class="row">
        <div class="col-25">
        </div>
        <div class="col-25">
        <p class="text-center"><br>Introduceti numele clientului:</p>
        </div>        
    </div>
    <div class="row">
        <div class="col-25">
        </div>
        <div class="col-25">
            <input type="text" name="nume">
            <input type="submit" href="admin_add_client.php" class="text-center">
        </div>        
    </div>
</form>
<br><br>
<?php
//request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //if(isset($_POST['submit']))
    {
        $output ='';
        $count = false;
        if(isset($_POST['nume']))
        {
            $searchq = $_POST['nume'];
            $sql = "SELECT * FROM client WHERE nume = '$searchq'";
            $query = mysqli_query($db->GetConn(), $sql);
            $count = mysqli_num_rows($query);
            if($count!=0)
            {
            $getRow = mysqli_fetch_row($query);
            $idClient =  $getRow['0'];
            $qry = "select * from rezervare where id_client = $idClient";
            $result = mysqli_query($db->GetConn(),$qry);
            }
        }
        echo $output;
    }
}

if(isset($count))
{
if($count==0){
                ?> <br><h2 class="text-center">Client inexistent!</h2> <?php
            } else {?>


<table id="customers">
    <tr>
        <td>Id_rezervare</td>
        <td>Client</td>
        <td>Produs</td>
        <td>Data</td>
        <td>Numar persoane</td>
        <td>Acțiuni</td>
    </tr>

    <?php

while($data = mysqli_fetch_array($result))
{
    $id = $data['id_client'];
    $qry = "select * from client where id_client = $id";
    $rs = mysqli_query($db->GetConn(),$qry);
    $getRow = mysqli_fetch_row($rs);
    $nume =  $getRow['4'];

    $idprodus = $data['id_produs'];
    $qry1 = "select * from produs where id_produs = $idprodus";
    $rs1 = mysqli_query($db->GetConn(),$qry1);
    $getRow1 = mysqli_fetch_row($rs1);
    $produs =  $getRow1['3'];
  ?>
      <tr>
        <td><?php echo $data['id_rezervare']; ?></td>
        <td><?php echo $nume; ?></td>
        <td><?php echo $produs; ?></td>
        <td><?php echo $data['data_rezervare']; ?></td>
        <td><?php echo $data['nr_persoane']; ?></td>
        <td>
            <form method="post">
                <input type="hidden" value="<?php echo $data['id_rezervare'] ?? 0 ?>" name="item_id">
                <button type="submit" name="delete" class="btn text-danger px-3 border-right">Anulează
                </button>
            </form>
        </td>
    </tr>
    <?php
}
?>
</table>
<?php
 }
}
 ?>
<?php
include('footer_admin.php');
?>