<?php
ob_start();
include('header_admin.php');

$sql = "SELECT * FROM produs";
$result = mysqli_query($db->GetConn(), $sql);
?>

<h2>Servicii disponibile pe vasele de croazieră RegalTour</h2>

<table id="customers">
  <tr>
    <td>Id_produs</td>
    <td>Denumire</td>
    <td>Categorie</td>
    <td>Vas</td>
    <td>Preț</td>
  </tr>

<?php
while($data = mysqli_fetch_array($result))
{
    $id = $data['id_vas'];
    $qry = "select * from vas where id_vas = $id";
    $rs = mysqli_query($db->GetConn(),$qry);
    $getRow = mysqli_fetch_row($rs);
    $numeVas =  $getRow['1'];

    $idServiciu = $data['id_tipserviciu'];
    $qry2 = "select * from tipserviciu where id_tipserviciu = $idServiciu";
    $rs2 = mysqli_query($db->GetConn(),$qry2);
    $getRow2 = mysqli_fetch_row($rs2);
    $numeServiciu =  $getRow2['1'];
  ?>
  <tr>
    <td><?php echo $data['id_produs']; ?></td>
    <td><?php echo $data['nume']; ?></td>
    <td><?php echo $numeServiciu; ?></td>
    <td><?php echo $numeVas; ?></td>
    <td><?php echo $data['pret']; ?>$</td>
  </tr>	
<?php
}
?>
</table>

<?php
include('footer_admin.php');
?>