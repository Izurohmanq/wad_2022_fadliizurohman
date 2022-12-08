<?php

if(!isset($_SESSION["login"])){
    echo"<script> silakan login terlebih dahulu </script>";
    header("Location:index.php?page=login");
    exit;
}
require "CONFIG/connector.php";
$id=$_GET["user"];

    
$numberRand= rand(10,100);

?>


<section>
    <div class="step-wizard">
        <ul class="step-wizard-list">
            <li class="step-wizard-item">
                <span class="progress-count">1</span>
                <span class="progress-label">Keranjang</span>
            </li>
            <li class="step-wizard-item current-item">
                <span class="progress-count">2</span>
                <span class="progress-label">Checkout</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">3</span>
                <span class="progress-label">Success</span>
            </li>
        </ul>
    </div>

    <div id="billshipping">
        <div class="billCheckout">
            <h2 class="text-center">Checkout, Bill, and Shipping</h2>
            <?php 
            $email = $_SESSION["email"];

            $dataProf = mysqli_query($conn, "SELECT * FROM user_db WHERE email = '$email'"); 
            $fetching = mysqli_fetch_assoc($dataProf);
        
            ?>
            <p class="text-center">
                <?='Alamat di: '.$fetching['alamat']?>
            </p>

            <div class="pilih w-50 mx-auto my-5">
                <div class="pilih1 d-flex justify-content-center">
                    <div class="ekspedisi w-50 pe-2">
                        <label for="ekspedisi" class="form label">Ekspedisi</label>
                        <select name="ekspedisi" class="form-control" id="ekspedisi">
                            <option value="JNT">JNT</option>
                        </select>
                    </div>
                    <div class="pilihCoupon w-50">
                        <label for="Coupon" class="form label">Coupon</label>
                        <select name="Coupon" class="form-control" id="Coupon">
                            <option value="WelcomeSaddlebagscoCoupon">
                                WelcomeSaddlebagscoCoupon
                            </option>
                        </select>
                    </div>
                </div>
                <div class="order my-5">
                    <h2 class="text-center">Your Order</h2>
                    <h5 class="text-center">Invoice: <?=$numberRand?></h5>
                    <hr class="mx-auto w-75" />

                    <div class="orderProduct border-bottom border-dark pb-2">
                        <?php 
                        
                        
                        $result = mysqli_query($conn, "SELECT * FROM `keranjang` WHERE id_user=$id");

                                if($result) {
                                        while($data = mysqli_fetch_array($result)) {
                        
                        
                        ?>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="ASSETS/images/<?=$data["gambar"]?>" width="150px" alt="picProduct" />
                                    </td>
                                    <td><?=$data["nama_tas"]?></td>
                                    <td><?=$data["qty"]?></td>
                                    <td><?=$data["totalHarga"]?></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php 
                                        }
                                        }
                        ?>
                        <?php 
                        
                        $sql = "SELECT  SUM(totalHarga) from keranjang";
                        $result2 = $conn->query($sql);
                        //display data on web page
                        while($row = mysqli_fetch_array($result2)){
                            $tot = $row['SUM(totalHarga)'];
                        }                        
                        
                        
                        ?>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Price Product</td>
                                    <td><?='Rp'.$tot?></td>
                                </tr>
                                <tr>
                                    <td>Coupon</td>
                                    <td>Disc. 30%</td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>Rp10000</td>
                                </tr>
                                <tr>
                                    <td>Total Price</td>
                                    <?php 
                                    $totHarga = ($tot + 10000) - ($tot + 10000)*3/10;
                                    ?>
                                    <td><?='Rp'. $totHarga?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="payment">
        <div class="paymentMethod mx-auto d-block w-75">
            <h2 class="text-center">Payment Method</h2>
            <h5 class="text-center">Invoice: <?=$numberRand?></h5>
            <hr class="mx-auto w-50" />

            <div class="pilihPayment mx-auto w-75">
                <input type="radio" name="BCA" id="BCA" />
                <label for="BCA"><img src="ASSETS/images/bca.png" width="20%" alt="bca" /></label>
            </div>

            <form action="CONFIG/checkout.php" method="post">
                <?php 
                    $result3 = mysqli_query($conn, "SELECT * FROM `keranjang`");
                    $data2 = mysqli_fetch_array($result3);
                ?>
                <input type="hidden" name="id_user" value="<?=$data2["id_user"]?>">
                <input type="hidden" name="invoice" value=<?=$numberRand?>>
                <a href="index.php?page=sukses">
                    <button class="btn btn-primary my-5 w-50 mx-auto d-block">
                        Bayar
                    </button>
                </a>
            </form>

        </div>
    </div>
</section>