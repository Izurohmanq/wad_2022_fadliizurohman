<!-- <section id="carrousel-product">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
                <img src="ASSETS/images/motor1.jpeg" class="d-block w-100" alt="carrousel 1" />
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="ASSETS/images/motor2.jpeg" class="d-block w-100" alt="carrousel 2" />
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="ASSETS/images/motor3.jpeg" class="d-block w-100" alt="carrousel 3" />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section> -->
<section id="barang">
    <div class="container w-100 py-5 my-5 d-flex text-center">
        <?php  
        
        include "CONFIG/connector.php";
        $result = mysqli_query($conn, "SELECT * FROM `produk_tas`");

        if($result) {
            while($data = mysqli_fetch_array($result)) {
        
        ?>
        <div class="card mt-5" style="width: 18rem">
            <a href="index.php?page=detail&id=<?= $data["id_tas"]?>">
                <img src="../ADMIN/ASSETS/IMAGEDB/<?= $data["gambar"] ?>" class="card-img-top rounded-2"
                    alt="<?= $data["nama_tas"] ?>" />
                <div class="card-body">
                    <h5 class="card-title fw-bolder text-dark"><?= $data["nama_tas"] ?></h5>
                    <p class="card-text text-dark"><?= $data["bahan_tas"] ?></p>
                    <h3 class="text-dark">Rp<?=$data["harga"]?></h3>
                </div>
            </a>
        </div>
        <?php 
            }
        } else {
            echo"data kosong";
        }
        ?>
</section>