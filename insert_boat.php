<?php
ob_start();
include('header_admin.php');
?>

<div class="container">
    <form action="" method="post">
    <div class="row">
            <div class="col-25">
            </div>
            <div class="col-75">
                <p class="text-center">Inserați datele noului vas:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                Nume:
            </div>
            <div class="col-75">
                <input type="text" name="name"><br>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                Capacitate:
            </div>
            <div class="col-75">
                <input type="text" name="capacitate"><br>
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
        $name = $_POST['name'];
        $capacitate = $_POST['capacitate'];

        $UserManager->addBoat($name, $capacitate);
        header("Location: succes.php");
    }
}

include('footer_admin.php');
?>