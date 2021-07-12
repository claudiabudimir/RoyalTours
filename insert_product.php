<?php
ob_start();
include('header_admin.php');
?>
<?php
$sql = "SELECT * FROM tipserviciu";
$result = mysqli_query($db->GetConn(), $sql);

$sql1 = "SELECT * FROM vas";
$result1 = mysqli_query($db->GetConn(), $sql1);
?>

<div class="container">
    <form action="" method="post">
        <div class="row">
            <div class="col-25">
            </div>
            <div class="col-75">
                <p class="text-center">Introduceți informațiile despre noul produs:</p>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                Denumire:
            </div>
            <div class="col-75">
                <input type="text" name="nume"><br>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                Categorie:
            </div>
            <div class="col-75">
                <select name="tipserviciu">
                    <option value=" "> </option>
                    <?php
        while($row = mysqli_fetch_array($result)) {
            echo '<option value='.$row['id_tipserviciu'].'>'.$row['denumire'].'</option>';
        }
        ?>
                </select><br>
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
        while($row = mysqli_fetch_array($result1)) {
            echo '<option value='.$row['id_vas'].'>'.$row['nume'].'</option>';
        }
        ?>
                </select><br>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                Preț:
            </div>
            <div class="col-75">
                <input type="text" name="pret"><br>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                Descriere:
            </div>
            <div class="col-75">
                <input type="text" name="descriere"><br>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                Locație poză:
            </div>
            <div class="col-75">
                <input type="text" name="poza"><br>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-75"></div>
            <div class="col-25"><input type="submit" href="#"></div>
        </div>
    </form>
</div>

<?php
//request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //if(isset($_POST['submit']))
    {
        $UserManager->addProduct($_POST['tipserviciu'], $_POST['id_vas'], $_POST['nume'], $_POST['pret'], $_POST['descriere'], $_POST['poza']);
        header("Location: succes.php");
    }
}

include('footer_admin.php');
?>