<?php

require "connector.php";

session_start();

$id_user = $_SESSION["id_user"];
$id_tas = $_POST["id"];
$gambar =  $_POST["gambar"];
$tas =  $_POST["tas"];
$qty =  $_POST["qty"];
$harga =  $_POST["harga"];

$totalHarga = $qty * $harga;
echo "$qty";

$query = "INSERT INTO keranjang VALUES ('', '$id_user', '$id_tas','$gambar', '$tas','$qty', '$totalHarga')";
$query2 = mysqli_query($conn, $query);

if($query2){
    header("Location:../index.php?page=cart&id=$id_user");
}

?>