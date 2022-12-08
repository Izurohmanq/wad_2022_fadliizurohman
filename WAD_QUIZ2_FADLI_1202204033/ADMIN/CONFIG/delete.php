<?php 

    require "connector.php";
    $id= $_GET["id"];
    mysqli_query($conn, "DELETE FROM produk_tas WHERE id_tas = $id");
    if(mysqli_affected_rows($conn) > 0){
        echo "
                <script> 
                    alert('data berhasil dihapus');
                    document.location.href = '../index.php';  
                </script>";
    } else {
        echo "
            <script> 
                alert('data tidak berhasil dihapus');
                document.location.href = '../index.php';  
            </script>";
    }
?>