<?php 
	include('functions_login.php');
    if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: home_login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<!--Alt Shift F beautify-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegalTour</title>

    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!--Owl -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous"
    />

    <!--Font awsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <!--Custom CSS file-->
    <link rel="stylesheet" href="style_client.css">
    <style>
        .my-nav{
            position: absolute;
            z-index: 10;
            width: 100%;
        }
        .carousel-item {
            height: 600px;
            background: no-repeat center center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
    <?php
    //require functions connection
    require('functions.php');
    ?>
</head>

<body>
<header id="header">
    <nav class=" my-nav navbar navbar-light navbar-expand ">
        <div class="container">


            <a class="navbar-brand" href="home_client.php">RegalTour</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="home_client.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        
                        <form method="post" action="home_login.php">

                        <?php echo display_error(); ?>

                        <div class="input-group">
                            <button type="submit" class="btn" name="logout">LogOut(<?php echo $_SESSION['user']['username']; ?>)</button>
                        </div>
                        </form>
                    </li>
                </ul>
            </div>
            <form action="#" class="font-size-14">
                <a href="home_cart.php" class="py-2 rounded-pill bg-dark">
                            <span class="font-size-14 px-2 text-white">
                                <i class="fas fa-shopping-cart"></i>
                            </span>
                </a>
            </form>
        </div>
    </nav>

    <div id="carouselExampleIndicators" class="carousel slide my-carousel my-carousel" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background-image: url('./assets/Banner1.png')">

            </div>
            <div class="carousel-item " style="background-image: url('./assets/Banner3.png')">

            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


</header>

<!--#main-->
<main id="main">
