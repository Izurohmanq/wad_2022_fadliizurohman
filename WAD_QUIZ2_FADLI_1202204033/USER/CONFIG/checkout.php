<?php

require "connector.php";
$id=$_POST["id_user"];
$invoice=$_POST["invoice"];
$query3 = "SELECT * FROM keranjang WHERE id_user=$id";
$query4 = mysqli_query($conn, $query3);

$dataProf = mysqli_query($conn, "SELECT * FROM user_db WHERE id_user = '$id'"); 
$fetching = mysqli_fetch_array($dataProf);
$alamat = $fetching["alamat"];

if($query4) {
    while($data = mysqli_fetch_array($query4)){
        $gambar = $data['gambar'];
        $invoice = $data["invoice"];
        $nama_tas = $data['nama_tas'];
        $qty = $data['qty'];
        $totalHarga = $data['totalHarga'];
        $query5 = "INSERT INTO checkout VALUES('','$id','$invoice', '$gambar', '$nama_tas', '$qty', '$totalHarga','$alamat','dibungkus')";
        $quer6 = mysqli_query($conn, $query5);
    }

    $hapusQuery = "DELETE FROM keranjang WHERE id_user=$id";
    $hapusQuery2 = mysqli_query($conn, $hapusQuery);
    header("Location:../index.php?page=sukses");
}
?>