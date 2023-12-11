<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM schedule_list INNER JOIN lapangan ON schedule_list.id_lap = lapangan.id_lap INNER JOIN jadwal ON schedule_list.id_jadwal = jadwal.id_jadwal INNER JOIN harga ON jadwal.id_harga = harga.id_harga  WHERE id = '$id'");

$data = mysqli_fetch_array($query);
?>
<div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                             <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Verifikasi Boking</h1>
                                    </div>
                                    <form class="user" method="POST">
                                    <div class="row">
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT max(id_pemesanan) as kodeTerbesar FROM pemesanan");
                                        $data34 = mysqli_fetch_array($query);
                                        $id_pemesanan = $data34['kodeTerbesar'];
                                        $urutan = (int) substr($id_pemesanan, 0, 3);
                                        $urutan++;                                       
                                        $huruf = "KPS";
                                        $id_pemesanan = $huruf . sprintf("%04s", $urutan);
                                        ?>
                                        <div class="col-md-3">
                                        <label for="exampleFormControlInput1" class="form-label">Kode Boking</label>
                                        <input type="text" class="form-control" value="<?php echo $id_pemesanan ?>" disabled="">
                                        <input type="hidden" class="form-control" name="kode_pesan" value="<?php echo $id_pemesanan ?>">
                                        </div>
    
                                        <div class="col-md-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Klub</label>
                                        <input type="text" class="form-control" value="<?php echo $data['title'];?>"  disabled="">
                                        </div>

                                        <div class="col-md-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Lapangan</label>
                                        <input type="text" class="form-control" value="<?php echo $data['no_lap'];?>" disabled="">
                                        </div>
                                        
                                        <div class="col-md-3">
                                        <label for="exampleFormControlInput1" class="form-label">Harga</label>
                                        <input type="text" class="form-control" value="<?php echo "Rp. " . number_format($data['harga']) ;?>" disabled="">
                                        <input type="hidden" name="harga" value="<?php echo $data['harga'];?>" >
                                        </div>

                                        <div class="col-md-6 mt-2">
                                        <label for="exampleFormControlInput1" class="form-label">Status Anggota</label>
                                        <select name="jam" class="form-control">
                                        <option disabled selected> Pilih </option>
                                        <option value="1">User</option>
                                        <option value="3">Member</option>
                                        </select>
                                        </div>

                                        <div class="col-md-6 mt-2">
                                        <label for="exampleFormControlInput1" class="form-label">Uang Cash</label>
                                        <input type="number" name="uangcash" class="form-control fs-1" value="<?php echo $data['harga'];?>">
                                        </div>
                                        
                                        
                                        <!-- ======================== -->
                                        <input type="hidden" name="id_pesan"       value="<?php echo $data['id'];?>" >
                                        <input type="hidden" name="bayardp"        value="0" >
                                        <input type="hidden" name="statusboking"   value="Lunas" >
                                        <input type="hidden" name="id_user"        value="<?php echo $data['id_user'];?>" >
                                        <input type="hidden" name="id_member"      value="<?php echo $data['id_member'];?>" >
                                        <!-- ======================== -->
                                        <div class="col-md-3">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block mt-4" name="verifikasiboking">Simpan</button>
                                    </form>
                                    <hr>
                                     </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php 
if (isset($_POST['verifikasiboking'])) {
  $kode_pesan = $_POST['kode_pesan'];
  $tgl_sekarang = date('Y-m-d');
  $jam = $_POST['jam'];
  $harga = $_POST['harga'];
  $bayardp = $_POST['bayardp'];
  $uangcash = $_POST['uangcash'];
  $id_pesan = $_POST['id_pesan'];
  $bukti="NULL";
  $id_user = $_POST['id_user'];
  $id_member = $_POST['id_member'];
  $statusboking = $_POST['statusboking'];
//   hitung
    $sisa = $harga - $uangcash;
$sql = mysqli_query($koneksi,"INSERT INTO pemesanan VALUES ('','$kode_pesan','$tgl_sekarang','$jam','$harga','$bayardp','$sisa','$uangcash','$id_pesan','$bukti','$id_user','$id_member')");
if ($sql) {
    $upstatus= mysqli_query($koneksi, "UPDATE schedule_list SET status_boking='$statusboking' WHERE id='$id_pesan'");
  ?>
    <script type="text/javascript">
      alert("Transaksi Berhasil Disimpan.. :-)");
      window.location ="?pg=boking";
    </script>
    <?php
  }
}
?>