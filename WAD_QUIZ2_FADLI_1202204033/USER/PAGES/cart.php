<?php
require "CONFIG/connector.php";

$id_user=$_GET["id"];
$query3 = "SELECT * FROM keranjang WHERE id_user ='$id_user'";
$query4 = mysqli_query($conn, $query3);

?>


<section>
    <!--        Main content          -->

    <div class="step-wizard">
        <ul class="step-wizard-list">
            <li class="step-wizard-item current-item">
                <span class="progress-count">1</span>
                <span class="progress-label">Keranjang</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">2</span>
                <span class="progress-label">Checkout</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">3</span>
                <span class="progress-label">Success</span>
            </li>
        </ul>
    </div>

    <div id="checkout" class="h-100 p-5 bg-dark mx-auto rounded-4">
        <?php
            if($query4) {
                while($data = mysqli_fetch_array($query4)) {
        ?>
        <div class="checkout d-flex justify-content-evenly align-items-center py-5">
            <img src="ASSETS/images/<?=$data["gambar"]?>" class="rounded-4" width="30%" alt="" />
            <p><?=$data["nama_tas"]?></p>
            <p><?=$data["qty"]?></p>
            <p><?=$data["totalHarga"]?></p>
            <div class="trash">
                <a href="CONFIG/delete_cart.php?id=<?=$data["id_tas"]?>">
                    <img src="ASSETS/images/icons8-trash-can-50.png" alt="trash" />
                </a>
            </div>
        </div>

        <?php 
                }
            }
        ?>
        <form action="index.php?page=checkout&id="></form>
        <a href="index.php?page=checkout&user=<?= $id_user?>">
            <button class="my-4 p-2 rounded-3 float-end">Checkout</button>
        </a>
    </div>

    <!--        Main content          -->
</section>