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
                <p class="text-center">Creați username și password pentru noul admin:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                Username:
            </div>
            <div class="col-75">
                <input type="text" name="username"><br>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                Password:
            </div>
            <div class="col-75">
                <input type="text" name="password"><br>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-75"></div>
            <div class="col-25"><input type="submit" href="admin_add_admin.php"></div>
        </div>
    </form>
</div>
<?php
//request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //if(isset($_POST['submit']))
    {
        $name = $_POST['username'];
        $password = $_POST['password'];
        $gender = 'admin';

        echo $name."<br>".$password."<br>".$gender."<br>";
        $UserManager->addUser($_POST['username'], $_POST['password'], $gender);
        header("Location: admin_add_admin.php");
    }
}

include('footer_admin.php');
?>