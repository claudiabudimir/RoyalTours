<?php
ob_start();
include('header_admin.php');

$sql = "SELECT * FROM rezervare ORDER BY id_rezervare DESC limit 5";
$result = mysqli_query($db->GetConn(), $sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        $deletedrecord = $Cart->deleteReservation($_POST['item_id']);
    }
}
?>

<h2>Detalii Ultimele Rezervări Efectuate </h2>

<table id="customers">
    <tr>
        <td>Id_rezervare</td>
        <td>Client</td>
        <td>Produs</td>
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
include('footer_admin.php');
?>