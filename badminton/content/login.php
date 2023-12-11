<section class="lapangan" id="lapangan">
    <div class="container">
      <main class="contain" data-aos="fade-right" data-aos-duration="1000">
        <h2 class="text-head">Login di <span>Badminton</span> Center </h2>
        <form method="POST" action="inc/prosloguser.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Masukan Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" require="Harap Diisi">
    <div id="emailHelp" class="form-text">Masukan account yang sudah di daftarkan</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" require="Harap Diisi">
  </div>
  <div class="mb-3 form-check">
    <a href="?pg=loginmember" class="text-decoration-none">Login Member</a>
    <a href="?pg=register" class="text-decoration-none text-success">Register</a>
  </div>
  <button type="submit" class="btn btn-primary btn-lg">Submit</button>
  <a href="?pg=home" class="btn btn-warning btn-lg">Kembali</a>
</form>
      </main>
    </div>
  </section>
