<?php

if(!isset($_SESSION)){
    session_start();
} 

require "CONFIG/connector.php";
if(isset($_SESSION["login"])){
    $email = $_SESSION["email"];
    $id = $_SESSION["id_user"];
    $dataProf = mysqli_query($conn, "SELECT * FROM user_db WHERE email = '$email'"); 
$fetching = mysqli_fetch_assoc($dataProf);
}

if(isset($_POST["submit"])){
    echo "<script> 
            alert('feedback berhasil ditambahkan');  
        </script>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SaddleBagsco</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Courier Prime" rel="stylesheet" />

    <link rel="stylesheet" href="ASSETS/css/user2.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top py-3 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="ASSETS/images/Group 5.png" width="80%" alt="logo saddle bags" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item px-3">
                        <a class="nav-link" aria-current="page" href="index.php?page=home">Home</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="index.php?page=product">Product</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="index.php?page=photos">Photos</a>
                    </li>
                </ul>
            </div>

            <?php if(!isset($_SESSION["login"])) : ?>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item px-3">
                        <a class="nav-link" href="index.php?page=login">Login</a>
                    </li>
                </ul>
            </div>
            <?php else: ?>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item px-3">
                        <a class="nav-link" href="index.php?page=profile"><?= $fetching["nama"]; ?></a>
                    </li>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </nav>

    <?php 
        if(isset($_GET["page"])) {
            $page = $_GET["page"];

            switch ($page) {
            case "home":
                include "PAGES/home.php";
                break;
            case "product":
                include "PAGES/product.php";
                break;
            case "photos":
                include "PAGES/photos.php";
                break;
            case "detail":
                include "PAGES/detail.php";
                break;
            case "login":
                include "PAGES/login_user.php";
                break;
            case "register":
                include "PAGES/register_user.php";
                break;
            case "profile":
                include "PAGES/profile.php";
                break;
            case "cart":
                include "PAGES/cart.php";
                break;
            case "checkout":
                include "PAGES/checkout.php";
                break;
            case "sukses":
                include "PAGES/sukses_bayar.php";
                break;
            default:
                echo"maaf halaman tidak ditemukan";
                break;
            }
        } else{
            include "PAGES/home.php"; 
        }
        
        
        
        ?>



    <!-- cart -->
    <div class="cart">
        <div class="position-relative">
            <div class="position-fixed bottom-0 end-0 me-5 mb-5">
                <div class="gambar p-3 rounded-5">
                    <?php if(isset($_SESSION["id_user"])):?>
                    <a href="index.php?page=cart&id=<?=$_SESSION["id_user"]?>"><img
                            src="ASSETS/images/shopping-cart.png" width="30px" alt="shoppingcart" /></a>
                    <?php else: ?>
                    <a href="index.php?page=cart"><img src="ASSETS/images/shopping-cart.png" width="30px"
                            alt="shoppingcart" /></a>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>

    <!--  -->

    <!-- modal  + footer -->
    <div class="modal fade" id="Feedback" tabindex="-1" aria-labelledby="Feedback" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="Feedback">Send Feedback</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="CONFIG/insert_curhatan.php" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                aria-describedby="emailHelp" />
                            <div id="emailHelp" class="form-text">
                                We'll never share your email with anyone else.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea name="message" class="form-control" id="message" cols="30" rows="10"></textarea>

                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="lokasi" tabindex="-1" aria-labelledby="lokasiLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="lokasiLabel">Our Location</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- lokasi -->
                    <section id="lokasi">
                        <div class="container text-center py-5 mb-5">
                            <div class="mapouter mx-auto">
                                <div class="gmap_canvas">
                                    <iframe width="300" height="300" id="gmap_canvas"
                                        src="https://maps.google.com/maps?q=komplek%20pln%20cinunuk%20cileunyi&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                                        href="https://www.whatismyip-address.com/divi-discount/">divi discount</a><br />
                                    <style>
                                    .mapouter {
                                        position: relative;
                                        text-align: right;
                                        height: 300px;
                                        width: 300px;
                                    }
                                    </style><a href="https://www.embedgooglemap.net">html google maps</a>
                                    <style>
                                    .gmap_canvas {
                                        overflow: hidden;
                                        background: none !important;
                                        height: 300px;
                                        width: 300px;
                                    }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- akhir lokasi -->
                </div>
            </div>
        </div>
    </div>

    <footer class="py-5 text-white bg-dark position-bottom">
        <div class="text-left ms-5 d-flex flex-column">
            <a href="https://www.instagram.com/saddlebags.co/">Instagram</a>
            <a href="" data-bs-toggle="modal" data-bs-target="#Feedback">
                Send Feedback
            </a>
            <a href="" data-bs-toggle="modal" data-bs-target="#lokasi">
                Our Location
            </a>
            <a href="Photos.html" data-bs-target="#lokasi"> Photos</a>
        </div>
        <hr width="90%" class="mx-auto" />
        <div class="Copy text-center">
            <p>Copyright 2022 SaddleBags.co</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>