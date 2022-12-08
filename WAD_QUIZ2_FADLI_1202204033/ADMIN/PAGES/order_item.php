<?php 

if(!isset($_SESSION["login"])){
    header("Location: login_admin.php");
    exit;
}

require "CONFIG/connector.php";
$result = mysqli_query($conn, "SELECT * FROM `checkout`");

if(isset($_POST["update"])){
    $status = $_POST["status"];

    $queryUpdate = "UPDATE checkout SET status = '$status'";
    $update = mysqli_query($conn, $queryUpdate);
    echo "<meta http-equiv='refresh' content='0'>";
}
?>
<section id="pesanan">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID Pemesanan</th>
                <th scope="col">ID User</th>
                <th scope="col">Jenis Tas</th>
                <th scope="col">Jumlah Tas</th>
                <th scope="col">Alamat</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Ekspedisi</th>
                <th scope="col">status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if($result){

                    while($data = mysqli_fetch_array($result)){

            ?>
            <tr>
                <th><?=$data["id_checkout"]?></th>
                <th><?=$data["id_user"]?></th>
                <th>
                    <?=$data["nama_tas"]?>
                </th>
                <th><?=$data["qty"]?></th>
                <th><?=$data["alamat"]?></th>
                <th><?=$data["totalHarga"]?></th>
                <th>JNT</th>
                <th>
                    <form action="" method="post">
                        <div class="d-flex">
                            <select name="status" class="form-control me-3" id="Coupon">
                                <option value="<?=$data["status"]?>">
                                    <?=$data["status"]?> - status sekarang
                                </option>
                                <option value="Dibungkus">
                                    Dibungkus
                                </option>
                                <option value="Dikirim">
                                    Dikirim
                                </option>
                            </select>
                            <button type="submit" name="update" class="btn btn-primary">update</button>
                        </div>

                    </form>

                </th>
            </tr>
            <?php  
                            }
                    }       
            ?>
        </tbody>
    </table>
</section>