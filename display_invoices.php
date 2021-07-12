<?php
ob_start();
include('header_admin.php');

$sql = "SELECT * FROM factura";
$result = mysqli_query($db->GetConn(), $sql);
?>

<h2>Facturi</h2>

<table id="customers">
    <tr>
        <td>Id_utilizator</td>
        <td>Nume client</td>
        <td>Subtotal</td>
    </tr>

<?php
while($data = mysqli_fetch_array($result))
{
    $id = $data['id_client'];
    $qry = "select * from client where id_client = $id";
    $rs = mysqli_query($db->GetConn(),$qry);
    $getRow = mysqli_fetch_row($rs);
    $numeClient =  $getRow['4'];
?>
    <tr>
        <td><?php echo $data['id_factura']; ?></td>
        <td><?php echo $numeClient; ?></td>
        <td><?php echo $data['valoare']; ?></td>
    </tr>
<?php
}
?>
</table>

<?php
include('footer_admin.php');
?>
