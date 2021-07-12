<div class="container">
    <form action="" method="post">
        <div class="row">
            <div class="col-25">
            </div>
            <div class="col-75">
                <p class="text-center">Introduceți datele adminului:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                Nume și prenume admin:
            </div>
            <div class="col-75">
                <input type="text" name="nume"><br>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                Funcția:
            </div>
            <div class="col-75">
                <input type="text" name="functie"><br>
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
        $UserManager->addAdmin($new_id, $_POST['nume'], $_POST['functie']);
        header("Location: succes.php");
    }
}
?>