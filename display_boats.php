<?php
ob_start();
include('header_admin.php');

$sql = "SELECT * FROM vas";
$result = mysqli_query($db->GetConn(), $sql);
?>

<h2>Detalii Vase</h2>

<table id="customers">
  <tr>
    <td>Id_vas</td>
    <td>Nume</td>
    <td>Capacitate</td>
  </tr>

<?php

while($data = mysqli_fetch_array($result))
{
?>
  <tr>
    <td><?php echo $data['id_vas']; ?></td>
    <td><?php echo $data['nume']; ?></td>
    <td><?php echo $data['capacitate']; ?></td>
  </tr>	
<?php
}
?>
</table>

<?php
include('footer_admin.php');
?>