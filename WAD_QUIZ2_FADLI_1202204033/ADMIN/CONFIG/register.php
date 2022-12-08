<?php 
require "connector.php";
function registrasi ($data){
    global $conn;

    $nama = strtolower(stripslashes($data["nama"]));
    $email = strtolower(stripslashes($data["email"]));
    $nohp = strtolower(stripslashes($data["nohp"]));
    $password = mysqli_real_escape_string($conn,$data["Password"]); //=> memungkina user memasukkan password ada kutipnya, 
    $cPassword = mysqli_real_escape_string($conn,$data["cPassword"]); //=> memungkina user memasukkan password ada kutipnya,

    // cek email kalau udah ada

    $result = mysqli_query($conn, "SELECT email FROM admin_db WHERE email = '$email' ");
    
    if(mysqli_fetch_assoc($result)){
        echo "<script> alert('emailnya sudah ada gan') </script>";
        return false;
    }
    // cek konfirmasi

    if( $password !== $cPassword){
        echo "<script> alert('konfirmasi password salah') </script>";
        return false;
    }

    // enskripsi password jangan pake md5

    $password = password_hash($password, PASSWORD_DEFAULT); // password mana yang mau diacak, algoritma buat ngacak password
    
    // tambahkan ke database
    $date = gmdate("Y/m/d h:i:sa");
    mysqli_query($conn, "INSERT INTO admin_db VALUES (
        '','$nama', '$email', '$nohp','$password','$date'
    )");

    return mysqli_affected_rows($conn);

}


?>