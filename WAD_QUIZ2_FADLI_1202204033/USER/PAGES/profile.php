<?php 

$email = $_SESSION["email"];
$id = $_SESSION["id_user"];

$dataProf = mysqli_query($conn, "SELECT * FROM user_db WHERE email = '$email'"); 
$fetching = mysqli_fetch_assoc($dataProf);


if(isset($_POST["save"])){
    $nama = $_POST["name"];
    $date = $_POST["date"];
    $number = $_POST["number"];
    $email = $_POST["email"];
    $alamat = $_POST["alamat"];

    $query = "UPDATE user_db SET
            email = '$email',
            nama = '$nama',
            tgl_lahir = '$date',
            nohp = '$number',
            alamat = '$alamat' 
             WHERE id_user = $id;
            ";
    $query2 = mysqli_query($conn, $query);

    if($query2){
        echo "<script> alert('data berhasil dibuah') </script>"; 
    }
}
?>

<section id="account" class="d-flex justify-content-center my-5">
    <div class="imageID mt-5">
        <p class="text-center mt-5">ID: <?=$fetching["id_user"] ?></p>
        <p class="text-center fs-4">Hello <?=$fetching["nama"] ?></p>

        <div class="aboutProfile d-flex flex-column">
            <!-- Button trigger modal -->
            <a href="" class="p-4 border border-3 text-dark" data-bs-toggle="modal" data-bs-target="#AccountDetail">
                Account Detail</a>
            <a href="" class="p-4 border border-3 text-dark" data-bs-toggle="modal" data-bs-target="#YourAddress">
                Your Address</a>
            <a href="" class="p-4 border border-3 text-dark" data-bs-toggle="modal" data-bs-target="#Coupon">
                My Coupon</a>
            <a href="" class="p-4 border border-3 text-dark" data-bs-toggle="modal" data-bs-target="#history">
                My Order History</a>
            <a href="" class="p-4 border border-3 text-dark" data-bs-toggle="modal" data-bs-target="#order">
                My Order</a>
            <a href="CONFIG/logout.php" class="p-4 border border-3 text-white text-center bg-danger">
                Log Out</a>

            <!-- Modal Account -->
            <div class="modal fade" id="AccountDetail" tabindex="-1" aria-labelledby="AccountDetailLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h1 class="modal-title fs-5 text-center" id="AccountDetailLabel">
                                Account Detail
                            </h1>
                            <form action="" method="post">
                                <label for="name" class="form-label"> Name</label>
                                <input type="text" class="form-control mb-3" name="name" id="name"
                                    value="<?=$fetching["nama"] ?>" />

                                <label for="date" class="form-label"> date birth</label>
                                <input type="date" class="form-control mb-3" name="date" id="date"
                                    value="<?=$fetching["tgl_lahir"] ?>" />

                                <label for="Number" class="form-label">Number</label>
                                <input type="number" class="form-control mb-3" name="number" id="number"
                                    value="<?=$fetching["nohp"] ?>" />

                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control mb-3" name="email" id="email"
                                    value="<?=$fetching["email"] ?>" />
                                <label for="alamat" class="form-label">alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" class="form-control"
                                    placeholder="<?=$fetching['alamat']?>" rows="10"><?=$fetching['alamat']?></textarea>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" name="save" class="btn btn-primary">
                                        Save changes
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- modal account -->

            <!-- Modal Address -->
            <div class="modal fade" id="YourAddress" tabindex="-1" aria-labelledby="YourAddressLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h1 class="modal-title text-center fs-5" id="YourAddressLabel">
                                Your Address
                            </h1>
                            <h4 class="fs-4">Rumah</h4>
                            <h5 class="fs-5"><?=$fetching["nama"] ?></h5>
                            <p><?=$fetching["nohp"] ?></p>
                            <p><?=$fetching["alamat"] ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Address -->

            <!-- Modal Coupon -->
            <div class="modal fade" id="Coupon" tabindex="-1" aria-labelledby="CouponLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h1 class="modal-title fs-5 text-center mb-5" id="CouponLabel">
                                My Coupon
                            </h1>
                            <div class="isiCoupon d-flex justify-content-evenly border border-3 align-items-center">
                                <div class="kiriCoupon pt-4">
                                    <h5>WelcomeSaddlebagscoCoupon</h5>
                                    <p>Discount 15% for all item</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Coupon -->

            <!-- Modal History -->
            <div class="modal fade" id="history" tabindex="-1" aria-labelledby="historyLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h1 class="modal-title fs-5 text-center mb-5" id="historyLabel">
                                My Order History
                            </h1>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Checkout ID</th>
                                        <th>Product</th>
                                        <th>QTY</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $result = mysqli_query($conn, "SELECT * FROM `checkout`");
                                    if($result){

                                        while($data = mysqli_fetch_array($result)){
                                                $n=1;
                                    
                                    ?>
                                    <tr>
                                        <td><?=$data["id_checkout"]?></td>
                                        <td><?=$data["nama_tas"]?></td>
                                        <td><?=$data["qty"]?></td>
                                        <td><?=$data["status"]?></td>
                                    </tr>
                                    <?php 
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal History -->

            <!-- Modal Order -->
            <div class="modal fade" id="order" tabindex="-1" aria-labelledby="orderLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h1 class="modal-title fs-5 text-center" id="orderLabel">
                                Modal title
                            </h1>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Checkout ID</th>
                                        <th>Product</th>
                                        <th>QTY</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $result = mysqli_query($conn, "SELECT * FROM `checkout`");
                                    if($result){

                                        while($data = mysqli_fetch_array($result)){
                                                $n=1;
                                    
                                    ?>
                                    <tr>
                                        <td><?=$data["id_checkout"]?></td>
                                        <td><?=$data["nama_tas"]?></td>
                                        <td><?=$data["qty"]?></td>
                                        <td><?=$data["status"]?></td>
                                    </tr>
                                    <?php 
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Order -->
        </div>
    </div>
</section>