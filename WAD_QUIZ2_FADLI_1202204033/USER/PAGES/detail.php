<section id="openProduct">

    <?php  
        

        include "CONFIG/connector.php";
        $id = $_GET["id"];
        $result = mysqli_query($conn, "SELECT * FROM `produk_tas` WHERE id_tas=$id");

        $data = mysqli_fetch_array($result);

        ?>
    <div class="open d-flex justify-content-center align-items-center">
        <div class="fotoProduct">
            <img src="../ADMIN/ASSETS/IMAGEDB/<?= $data["gambar"] ?>" alt="<?= $data["nama_tas"] ?>"
                class="jumbo mb-3 justify-content-center" />
        </div>
        <div class="contentProduct ms-3">
            <h2><?=$data["nama_tas"]?></h2>
            <p><?=$data["bahan_tas"]?></p>
            <h4><?=$data["harga"]?></h4>
            <p>
                <?=$data["deskripsi"]?>
            </p>
            <p>
                sisa <?=$data["qty"]?> tas
            </p>
            <label for="input">Masukkan Qty</label>
            <!-- <div class="decincre w-25 ms-3">
                <div class="d-flex justify-content-evenly align-items-center">
                    <p class="minus py-2 px-3 text-white bg-secondary border border-end">
                        -
                    </p>
                    <p class="num py-2 px-3 text-white bg-secondary">1</p>
                    <p class="plus py-2 px-3 text-white bg-secondary border border-start">
                        +
                    </p>
                </div>
            </div> -->
            <form action="CONFIG/insert_cart.php" method="post">
                <input type="hidden" name="gambar" value="<?= $data["gambar"] ?>">
                <input type="hidden" name="tas" value="<?= $data["nama_tas"] ?>">
                <input type="number" id="input" name="qty" class="form-control" min="1" max="<?=$data["qty"]?>">
                <input type="hidden" name="harga" value="<?= $data["harga"] ?>">
                <input type="hidden" name="id" value="<?= $id ?>">
                <a href="index.php?page=cart">
                    <button class="btn btn-primary mt-4 me-3">Add to Cart</button>
                </a>
            </form>


        </div>
    </div>


</section>