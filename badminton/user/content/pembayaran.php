<section class="lapangan" id="lapangan">
    <div class="container">
      <main class="contain" data-aos="fade-right" data-aos-duration="1000">
       
        <?php
        $id_user = $_SESSION['id_user'];
        $queryoo = mysqli_query($koneksi,"SELECT * FROM schedule_list INNER JOIN user ON schedule_list.id_user = user.id_user  WHERE user.id_user = '$id_user' ORDER BY schedule_list.id DESC LIMIT 1");
        $data22 = mysqli_fetch_array($queryoo);
        if ($data22['status_boking']=="Boking") {
         ?>
        <?php
            $id_user = $_SESSION['id_user'];
            $query1 = mysqli_query($koneksi,"SELECT * FROM schedule_list INNER JOIN lapangan ON schedule_list.id_lap = lapangan.id_lap INNER JOIN user ON schedule_list.id_user INNER JOIN jadwal ON schedule_list.id_jadwal = jadwal.id_jadwal INNER JOIN harga ON jadwal.id_harga = harga.id_harga  WHERE user.id_user = '$id_user' AND status_boking='Boking' ");
            $data33 = mysqli_fetch_array($query1);
            ?>
            <h2 class="text-head">Pembayaran di <span>Sport</span> Center </h2>
            <div class="card">
          
        <h5 class="card-header">Transaksi Boking <?php echo $data33['no_lap'];?></h5>
        <div class="card-body">
        <div class="alert alert-danger" role="alert">
        "Jika Ingin Membayar <b>DP</b>, Silahkan Dikirimkan Ke NO. Dana Ini = <b>0858-3294-2323</b>, Jangan lupa untuk diupload Bukti Transaksinya"
          </div>
          <table class="table">
            <form method="POST" enctype="multipart/form-data">
            <?php
            $query = mysqli_query($koneksi, "SELECT max(id_pemesanan) as kodeTerbesar FROM pemesanan");
            $data = mysqli_fetch_array($query);
            $id_pemesanan = $data['kodeTerbesar'];
            $urutan = (int) substr($id_pemesanan, 0, 3);
            $urutan++;                                       
            $huruf = "KPS";
            $id_pemesanan = $huruf . sprintf("%04s", $urutan);
            ?>
            <input type="hidden" name="kode_pesan" value="<?php echo $id_pemesanan ?>" >
            <input type="hidden" name="harga" value="<?php echo $data33['harga'];?>" >
            <input type="hidden" name="id_pesan" value="<?php echo $data33['id'];?>" >
            <input type="hidden" name="status_boking" value="Pending" >
            <input type="hidden" name="jumlah_jam" value="1">
            <tr>
            <th>Nama Pemesan</th>
            <td><?php echo $data33['title'];?></td>
            </tr>
            <tr>
            <th>Jadwal Mulai</th>
            <td><?php echo date('d-M-Y H:i:s', strtotime($data33['start_datetime']));?></td>
            </tr>
            <tr>
            <th>Jadwal Selesai</th>
            <td><?php echo date('d-M-Y H:i:s', strtotime($data33['end_datetime']));?></td>
            </tr>
            <tr>
            <th>Jumlah Jam</th>
            <td>1</td>
            </tr>
            <tr>
            <th>Harga Bayar</th>
            <td><?php echo "Rp. " . number_format($data33['harga']) ;?></td>
            </tr>
            <th>Bayar DP</th>
            <td><input type="number" class="form-control" name="bayardp" require="Wajib Diisi" placeholder="Masukan Nominal Uang"></td>
            </tr>
            </tr>
            <th>Upload Foto Bukti</th>
            <td><input type="file" class="form-control" name="bukti" require="Wajib Diisi"></td>
            </tr>
          </table>
          <a href="content/hapusjadwal.php?id=<?php echo $data33[0];?>" class="btn btn-danger">Hapus Jadwal</a>
          <button type="submit" name="simpantransaksi" class="btn btn-primary">Simpan Transaksi</button>
          </form>
        </div>
      </div>
         <?php
        }
        ?>
        <h2 class="text-head">Riwayat Pembayaran di <span>Sport</span> Center </h2>
        <div class="card ">       
        <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Lapangan</th>
                <th scope="col">Jadwal Mulai</th>
                <th scope="col">Jadwal Selesai</th>
                <th scope="col">Kode Pesan</th>
                <th scope="col">Harga</th>
                <th scope="col">DP</th>
                <th scope="col">Sisa Bayar</th>
                <th scope="col">Bukti</th>
                <th scope="col">Status</th>
                
                </tr>
            </thead>
            <tbody>
            <?php
            $id_user = $_SESSION['id_user'];
            $query =mysqli_query($koneksi,"SELECT * FROM pemesanan INNER JOIN schedule_list ON pemesanan.id = schedule_list.id INNER JOIN lapangan ON schedule_list.id_lap = lapangan.id_lap INNER JOIN user ON pemesanan.id_user = user.id_user WHERE user.id_user='$id_user'");
            $no=1;
            while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
            
            <td scope="row"><?php echo $no; ?></td>
            <td><?php echo $data['no_lap']?></td>
            <td><?php echo date('d-M-Y H:i:s', strtotime($data['end_datetime']));?></td>
            <td><?php echo date('d-M-Y H:i:s', strtotime($data['start_datetime']));?></td>
            <td><?php echo $data['kode_pesan']?></td>
            <td><?php echo "Rp. " . number_format($data['harga']) ;?></td>
            <td><?php echo "Rp. " . number_format($data['dp']) ;?></td>
            <td><?php echo "Rp. " . number_format($data['sisa']) ;?></td>
            <td><?php
										if($data['bukti'] == ""){
										?>
										<img src="bukti/badminton.png" width="40">
										<?php
										}
										else{
										?>
										<img src="../bukti/<?php echo $data['bukti'];?>" width="40"></td>
										<?php
										}
										?></td>
                  <td><?php
										if($data['status_boking'] == "Pending"){
										?>
										<span class="badge text-bg-danger"><?php echo $data['status_boking']?></span>
										<?php
										}
										else{
										?>
										<a href="content/struk.php?id_pemesanan=<?php echo $data[0]; ?>" onclick="return confirm('Sistem Akan Mencektak Struk?')" class="btn btn-success btn-sm" target="_blank">Cetak</a></td>
										<?php
										}
										?></td>
            
            </tr>
            <?php
                                                $no++;
                                            }	
                                                ?>
            </tbody>    
        </table>
        </div>
      </div>
      
      </main>
    </div>
  </section>

  <?php 
if (isset($_POST['simpantransaksi'])) {
  $id_user = $_SESSION['id_user'];
  $id_member="NULL";
  $cash="NULL";
  $tgl_sekarang = date('Y-m-d');
  $kode_pesan = $_POST['kode_pesan'];
  $harga = $_POST['harga'];
  $id_pesan = $_POST['id_pesan'];
  $jumlah_jam = $_POST['jumlah_jam'];
  $bayardp = $_POST['bayardp'];
  $status_boking = $_POST['status_boking'];
  
  $sisa = $harga - $bayardp;
  $nama_file = $_FILES['bukti']['name'];
  $source = $_FILES['bukti']['tmp_name'];
  $folder = '../bukti/';

  if ($bayardp >=  $harga) {
    ?>
    <script type="text/javascript">
      alert("Uang DP Tidak Boleh Lebih Dari Harga");
      window.location ="index.php?pg=pembayaran";
    </script>
    <?php
  }else{
    move_uploaded_file($source, $folder.$nama_file);
    $sql = mysqli_query($koneksi,"INSERT INTO pemesanan VALUES ('','$kode_pesan','$tgl_sekarang','$jumlah_jam','$harga','$bayardp'
                                                              ,'$sisa','$cash','$id_pesan','$nama_file','$id_user','$id_member')");
    if ($sql) {
      $upstatus= mysqli_query($koneksi, "UPDATE schedule_list SET status_boking='$status_boking' WHERE id='$id_pesan'");
      ?>
        <script type="text/javascript">
          alert("Transaksi Berhasil Di kirim");
          window.location ="index.php?pg=pembayaran";
        </script>
        <?php
      }
  }  
}
 ?>


