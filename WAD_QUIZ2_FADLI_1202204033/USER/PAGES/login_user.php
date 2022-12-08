<?php
    if(!isset($_SESSION)){
        session_start();
    }

    require "CONFIG/register.php";
    require "CONFIG/connector.php";

    if(isset($_POST["register"])){
        if(registrasi($_POST) > 0){
            echo "<script> 
            alert('user baru berhasil ditambahkan');  
        </script>";
        }else{
            echo mysqli_error($conn);
        }
    }


    if (isset($_SESSION["login"])){
        header("Location: index.php");
        exit;
    }

    if(isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["Password"];

        $result = mysqli_query($conn, "SELECT * FROM user_db WHERE email = '$email'");

        #cek email kalau ada berarti ketemu 1 biji
        if(mysqli_num_rows($result) === 1){
            // cek password

            $row = mysqli_fetch_assoc($result);
            // buat mengganti passwordnya soalnya sudah terenskripsi
            if (password_verify($password, $row["password"])) {
                // set dulu sessionnya, untuk nama, login, email

                $_SESSION["id_user"] = $row["id_user"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["nama"] = $row["nama"];
                $_SESSION["nohp"] = $row["nohp"];
                $_SESSION["login"] = true; 

                // di sini kita bisa set buat cookienya
                if(isset($_POST["remember"])){
                    // buat cookienya
                    // kita enkripsi duls, 
                    setcookie("id", $row["id"], time()+60);
                    setcookie("key", hash("sha256", $row["email"]));
                }
                echo "<script> 
                        alert('user baru berhasil ditambahkan');  
                        </script>";
                header("Location: index.php ");
                exit;
            };
        }
        // jadi gak usah pakai else 
        $error = true ;

    }

?>
<section id="Login">
    <div class="sesi-login mx-auto">
        <img class="mx-auto d-block" src="ASSETS/images/Group 5.png" alt="logo" />
        <h4 class="text-center my-5">Welcome, Amigo</h4>
        <?php if(isset($error)) :  ?>
        <p style="color:red;">usernamenya/paswordnya salah broooo sissssss</p>
        <?php endif ;  ?>
        <form action="" method="post">
            <input type="email" name="email" class="form-control my-2" id="email" placeholder="Username/Email"
                required />

            <input type="password" name="Password" class="form-control mb-3" id="Password" placeholder="Password"
                required />
            <input type="checkbox" name="remember" id="remember" />
            <label for="remember">remember me</label>

            <p class="mt-2">Forgot Password?</p>
            <a href="user2.html">
                <button type="submit" name="login" class="btn w-100">Login</button>
            </a>
        </form>

        <h6 class="text-center mt-3">
            Don't have account ? <a href="index.php?page=register">Join here</a>
        </h6>
    </div>
</section>