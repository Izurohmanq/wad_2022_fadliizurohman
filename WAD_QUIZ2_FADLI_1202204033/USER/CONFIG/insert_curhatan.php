<?php 

require "connector.php";
$email = $_POST["email"];
$curhatan = $_POST["message"];

$query = "INSERT INTO curhatan_user VALUES ('', '$email', '$curhatan')";
    $query2 = mysqli_query($conn, $query);

if($query2) {
    header("Location:../index.php");
}


?>