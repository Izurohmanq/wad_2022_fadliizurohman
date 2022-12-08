<?php 

if(!isset($_SESSION["login"])){
    header("Location: login_admin.php");
    exit;
}
?>

<section id="barang">
    <div class="container w-100 py-5 my-2 d-flex text-center">
        <?php  
        
        include "CONFIG/connector.php";
        $result = mysqli_query($conn, "SELECT * FROM `produk_tas`");

        if($result) {
            while($data = mysqli_fetch_array($result)) {
        
        ?>
        <div class="card my-3" style="width: 18rem">
            <a href="index.php?page=edit&id=<?=$data["id_tas"]?>">
                <img src="ASSETS/IMAGEDB/<?=$data["gambar"]?>" class="card-img-top rounded-2"
                    alt="<?= $data["nama_tas"] ?>" />
                <div class="card-body">
                    <h5 class="card-title fw-bolder text-dark"><?= $data["nama_tas"] ?></h5>
                    <p class="card-text text-dark"><?= $data["bahan_tas"] ?></p>
                    <h3 class="text-dark">Rp<?=$data["harga"]?></h3>
                    <a href="index.php?page=edit&id=<?=$data["id_tas"]?>"><button
                            class="btn btn-primary me-1">edit</button></a>
                    <a href="CONFIG/delete.php?id=<?=$data["id_tas"]?>"
                        onclick="return confirm('yakin gak nih?');"><button class="btn btn-danger">delete</button></a>
                </div>
            </a>
        </div>
        <?php 
            }
        } else {
            echo"data kosong";
        }
        ?>
    </div>
</section>