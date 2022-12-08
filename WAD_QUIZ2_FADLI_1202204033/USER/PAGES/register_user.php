<section id="signup">
    <div class="sesi-signup mx-auto">
        <img class="mx-auto d-block" src="ASSETS/images/Group 5.png" alt="logo" />
        <h4 class="text-center my-5">Let's Ride with Stylishh</h4>
        <form action="index.php?page=login" method="post">
            <input type="email" name="email" class="form-control my-2" id="email" placeholder="Username/Email"
                required />

            <input type="password" name="Password" class="form-control my-2" id="Password" placeholder="Password"
                required />
            <input type="text" name="nama" class="form-control my-2" id="name" placeholder="Name" required />
            <input type="date" name="date" class="form-control my-2" id="date" placeholder="Date Birth" required />
            <input type="number" name="number" class="form-control my-2" id="number" placeholder="Telephone Number"
                required />
            <textarea name="alamat" class="form-control my-2" id="alamat" placeholder="Your address" cols="30"
                rows="10"></textarea>
            <button name="register" type="submit" class="btn w-100">Register</button>
        </form>

        <h6 class="text-center mt-3">
            Already account ? <a href="login.html">Join here</a>
        </h6>
    </div>
</section>