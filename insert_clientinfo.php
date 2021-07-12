<?php
$sql = "SELECT * FROM vas";
$result = mysqli_query($db->GetConn(), $sql);

$sql1 = "SELECT * FROM camera";
$result1 = mysqli_query($db->GetConn(), $sql1);
?>

<div class="container">
    <form action="" method="post">
        <div class="row">
            <div class="col-25">
            </div>
            <div class="col-75">
                <p class="text-center">Introduceți datele clientului:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                Vas:
            </div>
            <div class="col-75">
                <select name="id_vas">
                    <option value=" "> </option>
                    <?php
        while($row = mysqli_fetch_array($result)) {
            echo '<option value='.$row['id_vas'].'>'.$row['nume'].'</option>';
        }
        ?>
                </select><br>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                Număr cameră:
            </div>
            <div class="col-75">
                <select name="id_camera">
                    <option value=" "> </option>
                    <?php
        while($row = mysqli_fetch_array($result1)) {
            echo '<option value='.$row['id_camera'].'>'.$row['id_camera'].'</option>';
        }
        ?>
                </select><br>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                Nume și prenume client:
            </div>
            <div class="col-75">
                <input type="text" name="nume"><br>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                CNP:
            </div>
            <div class="col-75">
                <input type="text" name="cnp"><br>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                Data sosire:
            </div>
            <div class="col-75">
                <input type="date" name="data_sosire"><br>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                Data plecare:
            </div>
            <div class="col-75">
                <input type="date" name="data_plecare"><br>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-75"></div>
            <div class="col-25"><input type="submit" href="admin_add_client.php"></div>
        </div>
    </form>
</div>

<?php
//request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //if(isset($_POST['submit']))
    {
        $UserManager->addClient($new_id, $_POST['id_vas'], $_POST['id_camera'], $_POST['nume'], $_POST['cnp'], $_POST['data_sosire'], $_POST['data_plecare']);
        //header("Location: succes.php");
    }
}
?>