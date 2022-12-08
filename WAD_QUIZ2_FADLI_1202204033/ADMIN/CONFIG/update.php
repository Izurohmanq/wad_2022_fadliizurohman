<?php
require "connector.php";

    // ambil data dari tiap element dalam form
    // pake htmlspecialchars biar gak diganggu user
    $id = $_POST["id_tas"];
    $namaProduk = htmlspecialchars($_POST["namaProduk"]);
    $bahanProduk = htmlspecialchars($_POST["bahanProduk"]);
    $jumlahProduk = htmlspecialchars($_POST["jumlahProduk"]);
    $hargaProduk = htmlspecialchars($_POST["hargaProduk"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $foto = $_FILES["foto"]["name"];
    $tmpName = $_FILES["foto"]["tmp_name"];

    move_uploaded_file($tmpName, "../ASSETS/IMAGEDB/".$foto);
    // query insert data into tables
    if($foto === ""){
        $query= "UPDATE produk_tas SET
                nama_tas = '$namaProduk',
                bahan_tas = '$bahanProduk',
                harga = '$hargaProduk',
                deskripsi = '$deskripsi',
                qty = '$jumlahProduk'
                WHERE id_tas = '$id'";
    }  else {
        $query= "UPDATE produk_tas SET
                nama_tas = '$namaProduk',
                bahan_tas = '$bahanProduk',
                harga = '$hargaProduk',
                deskripsi = '$deskripsi',
                qty = '$jumlahProduk',
                gambar = '$foto'
                WHERE id_tas = '$id'";
    }
    $query2 = mysqli_query($conn, $query); 


    if($query2) {
        header('Location: ../index.php');
    }

?>