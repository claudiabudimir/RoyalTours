<?php 
include('functions_login.php');
require('functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: home_login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: home_login.php");//daca incerci sa accesezi o pagina si nu esti logat te intoarte inapoi la login page
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegalTour</title>

    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
     <link rel="stylesheet" href="style_admin.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="home_admin.php">RegalTour-Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home_admin.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Clienți
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="search_client.php">Căutare rezervări client</a>
                        <a class="dropdown-item" href="display_clients.php">Afișare</a>
                        <a class="dropdown-item" href="insert_user_as_client.php">Adăugare</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="display_last_reservations.php">Ultimele produse rezervate</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admini
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="display_admins.php">Afișare</a>
                        <a class="dropdown-item" href="insert_user_as_admin.php">Adăugare</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Servicii
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="display_products.php">Afișare</a>
                        <a class="dropdown-item" href="insert_product.php">Adăugare</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Vase
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="display_boats.php">Afișare</a>
                        <a class="dropdown-item" href="insert_boat.php">Adăugare</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Rezervări
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="search_rezervare.php">Căutare rezervări</a>
                        <a class="dropdown-item" href="display_reservations.php">Afișare</a>
                        <a class="dropdown-item" href="display_invoices.php">Facturi</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="display_subscribed.php" id="navbarDropdown" role="button"
                         aria-haspopup="true" aria-expanded="false">
                        Abonați
                    </a>
                </li>
                <li class="nav-item">
                    <form method="post" action="home_login.php">

                        <?php echo display_error(); ?>

                        <div class="input-group">
                            <button type="submit" class="btn"
                                name="logout">LogOut(<?php echo $_SESSION['user']['username']; ?>)</button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!--#main-->
    <main id="main">