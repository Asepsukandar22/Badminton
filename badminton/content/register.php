<section class="lapangan" id="lapangan">
    <div class="container">
      <main class="contain" data-aos="fade-right" data-aos-duration="1000">
        <h2 class="text-head">Register di <span>Badminton</span> Center </h2>
        <form method="POST">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Masukan Nama Lengkap</label>
    <input type="text" class="form-control" name="nama_lengkap" require="Harap Diisi">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Masukan Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" require="Harap Diisi">
    <div id="emailHelp" class="form-text">Masukan account yang sudah di daftarkan</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" require="Harap Diisi">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">No. Hanphone</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="no_hp" require="Harap Diisi">
  </div>
  <div class="mb-3 form-check">
    <a href="?pg=loginmember" class="text-decoration-none">Login Member</a>
    <!-- <a href="?pg=login" class="text-decoration-none text-success">Register</a> -->
  </div>
  <input type="hidden" name="akses" value="user">
  <button type="submit" class="btn btn-primary btn-lg" name="simpan">Submit</button>
  <a href="?pg=home" class="btn btn-warning btn-lg">Kembali</a>
</form>
      </main>
    </div>
  </section>
  
  <?php
									if (isset($_POST['simpan'])) {
									  $nama_lengkap = $_POST['nama_lengkap'];
									  $email = $_POST['email'];
									  $password = $_POST['password'];
									  $no_hp = $_POST['no_hp'];
									  $akses = $_POST['akses'];  
									  $sql = mysqli_query($koneksi,"INSERT INTO user VALUES ('','$nama_lengkap','$email','$password','$no_hp','$akses')");
									  if ($sql) {
									    ?>
									    <script type="text/javascript">
									      alert("Selamat Anda Berhasil Mendaftar");
									      window.location = "?pg=login";
									    </script>
									    <?php
									  }

									}
									?>