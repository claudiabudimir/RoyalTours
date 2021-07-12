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
<?php
$sql = "SELECT * FROM client";
$result = mysqli_query($db->GetConn(), $sql);
?>

<h2>Detalii Clienți</h2>

<table id="customers">
    <tr>
        <td>Id_utilizator</td>
        <td>Nume complet</td>
        <td>Vas</td>
        <td>Număr cameră</td>
        <td>Dată sosire</td>
        <td>Dată plecare</td>
        <td>CNP</td>
        <td>Acțiuni</td>
    </tr>

<?php
while($data = mysqli_fetch_array($result))
{
    $id = $data['id_vas'];
    $qry = "select * from vas where id_vas = $id";
    $rs = mysqli_query($db->GetConn(),$qry);
    $getRow = mysqli_fetch_row($rs);
    $numeVas =  $getRow['1'];
?>
        <tr>
        <td><?php echo $data['id_utilizator']; ?></td>
        <td><?php echo $data['nume']; ?></td>
        <td><?php echo $numeVas; ?></td>
        <td><?php echo $data['id_camera']; ?></td>
        <td><?php echo $data['data_sosire']; ?></td>
        <td><?php echo $data['data_plecare']; ?></td>
        <td><?php echo $data['cnp']; ?></td>
        <td>
            <form method="post">
                <input type="hidden" value="<?php echo $data['id_client'] ?? 0 ?>" name="item_id">
                <button type="submit" name="delete" class="btn text-danger px-3 border-right">Ștergere
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