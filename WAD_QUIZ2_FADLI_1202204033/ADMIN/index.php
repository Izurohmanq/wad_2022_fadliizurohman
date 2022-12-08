<?php 

require "CONFIG/connector.php";

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION["login"])){
    header("Location: login_admin.php");
    exit;
}
$email = $_SESSION["email"];

$dataProf = mysqli_query($conn, "SELECT * FROM admin_db WHERE email = '$email'"); 
$fetching = mysqli_fetch_assoc($dataProf);
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
                <img src="ASSETS/Group 5.png" width="80%" alt="logo saddle bags" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item px-3">
                        <a class="nav-link" aria-current="page" href="index.php?page=list_item">Kelola</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="index.php?page=create_item">Tambah</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="index.php?page=order_item">Pesanan</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?= $fetching["nama"] ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./CONFIG/logout.php">Logout</a></li>
                        </ul>
                    </div>
                </ul>
            </div>


        </div>
    </nav>

    <?php 
      if(isset($_GET["page"])) {
        $page = $_GET["page"];

        switch ($page) {
          case "list_item":
            include "PAGES/list_item.php";
            break;
          case "create_item":
            include "PAGES/create_item.php";
            break;
          case "order_item":
            include "PAGES/order_item.php";
            break;
          case "edit":
            include "PAGES/edit.php";
            break;
          case "curhatan":
            include "PAGES/curhatan.php";
            break;
          default:
            echo"maaf halaman tidak ditemukan";
            break;
        } 
      }else{
        include "PAGES/list_item.php";
    }
    
    ?>

    <!-- Keranjang -->
    <div class="keranjang">
        <div class="position-relative">
            <div class="position-fixed bottom-0 end-0 me-5 mb-5">
                <div class="gambar  p-3 rounded-5">
                    <a href="index.php?page=curhatan"><img src="ASSETS/image/user.png" width="30px" alt="curhatan_user"
                            class="ms-1" /></a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>