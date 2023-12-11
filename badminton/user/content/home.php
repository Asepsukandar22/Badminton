  <!-- Jumbotron -->
  <section class="jumbotron" id="home">
    <main class="contain" data-aos="fade-right" data-aos-duration="1000">
      <h1 class="text-light">Sehatkan Dirimu Dengan Berolahraga di <span>Badminton</span> Center </h1>
      <p>
      "Tidak ada rahasia. Ini semua tentang melakukan hal yang sama berulang kali. Ini semua tentang melakukan yang terbaik setiap hari."
      </p>
      
    </main>
  </section>
  <!-- End Jumbotron -->
  <section class="lapangan" id="lapangan">
    <div class="container">
    <h2 class="text-head">Lapangan di <span>Sport</span> Center </h2>
    <div class="row" id="load_data">
      <?php
        
        $query = "SELECT * FROM lapangan ORDER BY id_lap ASC";
        $dewan1 = $koneksi->prepare($query);
        $dewan1->execute();
        $res1 = $dewan1->get_result();
        while ($row = $res1->fetch_assoc()) {
          $id = $row["id_lap"];
          $foto = $row["foto"];
          // $tgl_input = $row["tgl_input"];
          $judul = $row["no_lap"];
          if (strlen($judul) > 60) {
            $judul = substr($judul, 0, 60) . "...";
          }
          $deskripsi = $row["deskripsi"];
          if (strlen($deskripsi) > 100) {
            $deskripsi = substr($deskripsi, 0, 100) . "...";
          }
      ?>
        <div class="col-sm-3 mb-3">
          <div class="card">
            <img src="../admin/img/<?php echo $foto; ?>" class="card-img-top" alt="gambar">
            <div class="card-body">
              <h5 class="card-title"><?php echo $judul; ?></h5>
              <p class="card-text"><?php echo $deskripsi; ?></p>
            </div>
            <div class="card-footer">
            <a href="?pg=jadwal&&id_lap=<?= $row["id_lap"]; ?>" class="btn btn-inti">Jadwal Boking</a> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Harga
            </button>
              </div>
          </div>
        </div>
        <?php } ?>
        <!-- Modal +++ -->           
    </div>
    
    
  </section>
  <!-- About -->
  
  <!-- End About -->

  <!-- Pembayaran -->
  <section class="pembayaran" id="bayar">
    <h2 data-aos="fade-down" data-aos-duration="1000">
      <span>Tata Cara</span> Boking Lapangan
    </h2>
    <p class="text-center">Berikut adalah tata cara pembayaran lapangan pada website Badminton Center:</p>
    <ul class="border list-group list-group-flush mt-5">
      <li class="list-group-item">1. Pengguna harus membuat akun atau mendaftar sebagai anggota pada website Badminton Center.</li>
      <li class="list-group-item">2. Pengguna dapat memilih jenis lapangan yang ingin dipesan, Pilih tombol jadwal boking untuk melihat jadwal yang kosong</li>
      <li class="list-group-item">3. Jika ada tombol boking lapangan anda bisa bisa langsung untuk boking lapangan.</li>
      <li class="list-group-item">4. Sebelum memilih waktu boking pastikan jadwal tersebut kosong.</li>
      <li class="list-group-item">5. setelah melakukan boking anda di persilahkan untuk membayar DP atau pun anda bisa langsung bayar di tempat</li>
      <li class="list-group-item">6. Lakukan pembayaran ke rekening yang sudah tertera dan upload bukti pembayaran</li>
      <li class="list-group-item">7. Setelah upload, tunggu admin menyetujui pembayaran anda</li>
      <li class="list-group-item">8. Setelah status sudah di setujui, silahkan datang ke Badminton Center sesuai jadwal yang di pesan</li>
    </ul>
  </section>
  <!-- End Pembayaran -->
  <!-- Contact -->
  <section id="contact" class="contact" data-aos="fade-down" data-aos-duration="1000">
    <h2><span>Kontak</span> Kami</h2>
    <p class="text-center m-5">
      Hubungi kami jika ada saran yang ingin di sampaikan
    </p>
    <div class="row">
      <div class="col">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d507647.0238694795!2d107.08353226546932!3d-6.264732182087622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69775e79e70e01%3A0x301576d14feb9e0!2sKarawang%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1674768522563!5m2!1sen!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
      </div>
      <div class="col">
        <form action="">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i data-feather="user"></i></span>
            </div>
            <input type="text" name="" id="" placeholder="nama" class="form-control" />
          </div>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i data-feather="mail"></i></span>
            </div>
            <input type="text" name="" id="" placeholder="email" class="form-control" />
          </div>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i data-feather="phone"></i></span>
            </div>
            <input type="text" name="" id="" placeholder="no telp" class="form-control" />
          </div>
          <button type="submit" class="btn btn-inti mt-3">Kirim Pesan</button>
        </form>
      </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">List Harga</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Jam</th>
              <th scope="col">Waktu</th>
              <th scope="col">Harga</th>
              
            </tr>
          </thead>
          <tbody>
          <?php
            $query =mysqli_query($koneksi,"SELECT * FROM jadwal INNER JOIN harga ON jadwal.id_harga = harga.id_harga");
            $no=1;
            while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
              <th scope="row"><?php echo $no; ?></th>
              <td><?php echo $data['jam']?></td>
              <td><?php echo $data['waktu']?></td>
              <td><?php echo $data['harga']?></td>
            </tr>
            <?php
                                                $no++;
                                            }	
                                                ?>
          </tbody>
        </table>
      </div>
      
    </div>
  </div>
</div>
  </section>
  <!-- End Contact -->

  