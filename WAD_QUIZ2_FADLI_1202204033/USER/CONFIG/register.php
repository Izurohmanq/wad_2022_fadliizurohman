<?php 
require "connector.php";
function registrasi ($data){
    global $conn;

    $nama = strtolower(stripslashes($data["nama"]));
    $email = strtolower(stripslashes($data["email"]));
    $nohp = strtolower(stripslashes($data["number"]));
    $password = mysqli_real_escape_string($conn,$data["Password"]); //=> memungkina user memasukkan password ada kutipnya, 
    $tgl_lahir = date($data["date"]);
    $alamat = $data["alamat"];
    // cek email kalau udah ada

    $result = mysqli_query($conn, "SELECT email FROM user_db WHERE email = '$email' ");
    
    if(mysqli_fetch_assoc($result)){
        echo "<script> alert('emailnya sudah ada gan') </script>";
        return false;
    }

    // enskripsi password jangan pake md5

    $password = password_hash($password, PASSWORD_DEFAULT); // password mana yang mau diacak, algoritma buat ngacak password
    
    // tambahkan ke database
    mysqli_query($conn, "INSERT INTO user_db VALUES (
        '','$email','$password', '$nama','$tgl_lahir', '$nohp','$alamat'
    )");

    return mysqli_affected_rows($conn);

}


?>