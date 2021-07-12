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

<h2>Căutare Rezervări</h2>

<br><br><br><br><br>
<form method="POST">
    <div class="row">
        <div class="row">
            <div class="col-25 text-center">
                Denumire serviciu:
            </div>
            <div class="col-75">
                <input type="text" name="nume"><br>
            </div>
        </div>

        <div class="row">
            <div class="col-25 text-center">
                From:
            </div>
            <div class="col-75">
                <input type="date" name="from"><br>
            </div>
        </div>


        <div class="row">
            <div class="col-25 text-center">
                To:
            </div>
            <div class="col-75">
                <input type="date" name="to">
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-25">
            </div>
            <div class="col-25">
            <input type="submit" value="Cautare" name="submit">
            </div>
        </div>
    </div>
</form>

<?php
//request method post
if (isset($_POST['submit'])){
    if(isset($_POST['from'])&& isset($_POST['to']) && isset($_POST['nume']))
    {  
        $denumire = $_POST['nume'];
        $sql = "SELECT * FROM produs WHERE nume = '$denumire'";
        $q = mysqli_query($db->GetConn(), $sql);
        $countNames = mysqli_num_rows($q);
        if($countNames !=0)
        {  
            $getRow = mysqli_fetch_row($q);
            $id_produs =  $getRow['0'];   
        }

        $from=date('Y-m-d',strtotime($_POST['from']));
        $to=date('Y-m-d',strtotime($_POST['to']));

        $count =0;
        if(isset($id_produs))
        {
        $sql = "SELECT * FROM rezervare WHERE (id_produs = $id_produs) AND (data_rezervare BETWEEN '" . $from . "' AND  '" . $to . "')
        ORDER by id_rezervare DESC";
        $query = mysqli_query($db->GetConn(), $sql);
        $count = mysqli_num_rows($query);
        }
    }
}
if(isset($count))
{
if($count==0){
             ?> <br>
<h2 class="text-center">Serviciu inexistent!</h2> <?php
            } else {?>
                    <br><br>
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

while($data = mysqli_fetch_array($query))
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