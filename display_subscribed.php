<?php
ob_start();
include('header_admin.php');

$sql = "SELECT * FROM abonat";
$result = mysqli_query($db->GetConn(), $sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        $deletedrecord = $UserManager->deleteSubscriber($_POST['item_id']);
    }
}
?>

<h2>Abonați platformă</h2>

<table id="customers">
    <tr>
        <td>Id_abonat</td>
        <td>Email</td>
        <td>Acțiuni</td>
    </tr>

<?php
while($data = mysqli_fetch_array($result))
{
?>
    <tr>
        <td><?php echo $data['id_abonat']; ?></td>
        <td><?php echo $data['email']; ?></td>
        <td>
            <form method="post">
                <input type="hidden" value="<?php echo $data['id_abonat'] ?? 0 ?>" name="item_id">
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