<?php
require "connector.php";

    // ambil data dari tiap element dalam form
    // pake htmlspecialchars biar gak diganggu user
    $namaProduk = htmlspecialchars($_POST["namaProduk"]);
    $bahanProduk = htmlspecialchars($_POST["bahanProduk"]);
    $jumlahProduk = htmlspecialchars($_POST["jumlahProduk"]);
    $hargaProduk = htmlspecialchars($_POST["hargaProduk"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $foto = $_FILES["foto"]["name"];
    $tmpName = $_FILES["foto"]["tmp_name"];

    move_uploaded_file($tmpName, "../ASSETS/IMAGEDB/".$foto);
    // query insert data into tables
    $query = "INSERT INTO produk_tas VALUES ('', '$namaProduk', '$bahanProduk', '$hargaProduk', '$deskripsi', '$jumlahProduk', '$foto' )";
    $query2 = mysqli_query($conn, $query); 


    if($query2) {
        header('Location: ../index.php');
    }

?>