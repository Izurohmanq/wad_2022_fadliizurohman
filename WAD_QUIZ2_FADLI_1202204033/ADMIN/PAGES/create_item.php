<?php 

if(!isset($_SESSION["login"])){
    header("Location: login_admin.php");
    exit;
}
?>

<section id="tambah">
    <div class="formtas">
        <form Action="CONFIG/insert.php" class="w-75" method="post" enctype="multipart/form-data">
            <div class="gambarTas">
                <label for="tas" class="form-label">Gambar</label>
                <input type="file" accept="image/" class="form-control" id="tas" name="foto" required />
            </div>
            <div class="mb-3">
                <label for="namaProduk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="namaProduk" name="namaProduk" required />
            </div>
            <div class="mb-3">
                <label for="bahanProduk" class="form-label">Bahan Produk</label>
                <input type="text" class="form-control" id="bahanProduk" name="bahanProduk" required />
            </div>
            <div class="mb-3">
                <label for="jumlahProduk" class="form-label">Jumlah Produk</label>
                <input type="number" class="form-control" id="jumlahProduk" name="jumlahProduk" required />
            </div>
            <div class="mb-3">
                <label for="hargaProduk" class="form-label">Harga Produk</label>
                <input type="number" class="form-control" id="hargaProduk" name="hargaProduk" required />
            </div>
            <div class="mb-3">
                <label for="Deskripsi" class="form-label">Deskripsi Produk</label>
                <textarea cols="10" rows="3" class="form-control" id="deskripsi" name="deskripsi"
                    placeholder="Tulis deskripsi barang di sini" required></textarea>
            </div>
            <button type="submit" class="btn form-control">Submit</button>
        </form>
    </div>
</section>