<section>
    <?php 
    
    if(!isset($_SESSION["login"])){
        header("Location: login_admin.php");
        exit;
    }
    include "CONFIG/connector.php";
    $id =$_GET["id"];
    
        $result = mysqli_query($conn, "SELECT * FROM `produk_tas` WHERE id_tas = $id");
    $data = mysqli_fetch_array($result);
    
    ?>
    <div class="open d-flex justify-content-center align-items-center" style="margin-top:10%;">
        <div class="col-4">
            <div class="row">
                <div class="fotoProduct">
                    <img src="ASSETS/IMAGEDB/<?=$data['gambar']?>" alt="gambar tas"
                        class="w-100 justify-content-center" />
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="contentProduct ms-5 my-5">
                    <form Action="CONFIG/update.php" class="w-75" method="post" enctype="multipart/form-data">
                        <div class="gambarTas">
                            <label for="tas" class="form-label fw-bold">Gambar</label>
                            <input type="file" accept="image/" class="form-control" id="tas" name="foto" />
                            <span>gambar yang sedang digunakan adalah <b><?=$data["gambar"]?></b></span>
                        </div>
                        <div class="mb-3">
                            <label for="namaProduk" class="form-label fw-bold">Nama Produk</label>
                            <input type="text" class="form-control" id="namaProduk" name="namaProduk"
                                value="<?=$data["nama_tas"]?>" required />
                        </div>
                        <div class="mb-3">
                            <label for="bahanProduk" class="form-label fw-bold">Bahan Produk</label>
                            <input type="text" class="form-control" id="bahanProduk" name="bahanProduk"
                                value="<?=$data["bahan_tas"]?>" required />
                        </div>
                        <div class="mb-3">
                            <label for="jumlahProduk" class="form-label fw-bold">Jumlah Produk</label>
                            <input type="number" class="form-control" id="jumlahProduk" name="jumlahProduk"
                                value="<?=$data["qty"]?>" required />
                        </div>
                        <div class="mb-3">
                            <label for="hargaProduk" class="form-label fw-bold">Harga Produk</label>
                            <input type="number" class="form-control" id="hargaProduk" name="hargaProduk"
                                value="<?=$data["harga"]?>" required />
                        </div>
                        <div class="mb-3">
                            <label for="Deskripsi" class="form-label fw-bold">Deskripsi Produk</label>
                            <textarea cols="10" rows="3" class="form-control" id="deskripsi" name="deskripsi"
                                placeholder="Tulis deskripsi barang di sini"
                                required><?=$data["deskripsi"]?>"</textarea>
                        </div>
                        <input type="hidden" name="id_tas" value="<?=$data['id_tas'];?>">
                        <button type="submit" class="btn btn-primary form-control">Ubah</button>
                    </form>
                </div>
            </div>


        </div>
</section>