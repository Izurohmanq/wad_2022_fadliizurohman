<section id="curhatan">
    <div class="container">
        <h2 class="text-center">Curhatan</h2>


        <?php 
    
        require "CONFIG/connector.php";
        
        $result = mysqli_query($conn, "SELECT * FROM curhatan_user");

        if($result){
            while($data = mysqli_fetch_array($result)){
    ?>
        <div class="card w-75 mt-4 m-auto">
            <div class="card-body">
                <h5 class="card-title"><?= $data["email"] ?></h5>
                <p class="card-text"><?= $data["curhatan"] ?></p>
            </div>
        </div>
        <?php 
        }
    }
    ?>
    </div>
</section>