<?php
session_start();

require "connector.php";
$id= $_GET["id"];
$id_user = $_SESSION["id_user"];
$query2= mysqli_query($conn, "DELETE FROM keranjang WHERE id_tas = $id");

if($query2){
    header("Location:../index.php?page=cart&id=$id_user");
}

?>