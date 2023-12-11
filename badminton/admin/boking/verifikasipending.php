<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM schedule_list INNER JOIN pemesanan ON pemesanan.id = schedule_list.id WHERE schedule_list.id = '$id'");

$data = mysqli_fetch_array($query);
?>
<div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                             <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Verifikasi Pending</h1>
                                    </div>
                                    <form class="user" method="POST">
                                    <div class="row">

                                        <div class="col-md-4 text-center">
                                        <label for="exampleFormControlInput1" class="form-label ">Bukti Bayar</label><br>
                                        <img  src="../bukti/<?php echo $data['bukti'];?>" width="100%">
                                        <a href=""  target = "_blank"></a>
                                        </div>

                                        <div class="col-md-2">
                                        <label for="exampleFormControlInput1" class="form-label">Kode Boking</label>
                                        <input type="text" class="form-control" value="<?php echo $data['kode_pesan'];?>" disabled="">
                                        <input type="hidden" class="form-control" value="<?php echo $data['kode_pesan'];?>">
                                        </div>
    
                                        <div class="col-md-2">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Klub</label>
                                        <input type="text" class="form-control" value="<?php echo $data['title'];?>"  disabled="">
                                        </div>
                                        
                                        <div class="col-md-2">
                                        <label for="exampleFormControlInput1" class="form-label">Harga</label>
                                        <input type="text" class="form-control" value="<?php echo "Rp. " . number_format($data['harga']) ;?>" disabled="">
                                       
                                        </div>


                                        <div class="col-md-2 mt-2">
                                        <label for="exampleFormControlInput1" class="form-label">Sisa Yang Harus Dibayar</label>
                                        <input type="number" class="form-control fs-1" value="<?php echo $data['sisa'];?>" disabled="">
                                        <input type="hidden" name="uangcash" class="form-control" value="<?php echo $data['sisa'];?>" >
                                        </div>
                                        
                                        <!-- ======================== -->
                                        <input type="hidden" name="uangsisa"   value="<?php echo $data['sisa'];?>" >
                                        <input type="hidden" name="statusboking"   value="Lunas" >
                                        <input type="hidden" name="id_pesan"       value="<?php echo $data['id'];?>" >
                                        <input type="hidden" name="id_pemesanan"       value="<?php echo $data['id_pemesanan'];?>" >
                                        <!-- ======================== -->
                                        
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block mt-4" name="verifikasipending">Simpan</button>
                                    </form>
                                    <hr>
                                     </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php 
if (isset($_POST['verifikasipending'])) {

  $id_pemesanan = $_POST['id_pemesanan'];
  $id_pesan = $_POST['id_pesan'];
  $uangcash = $_POST['uangcash'];
  $uangsisa = $_POST['uangsisa'];
  $tgl_sekarang = date('Y-m-d');
  $statusboking = $_POST['statusboking'];
  $sisa = $uangsisa - $uangcash;

  $sql= mysqli_query($koneksi,"UPDATE pemesanan SET tanggal='$tgl_sekarang',sisa='$sisa' WHERE id_pemesanan='$id_pemesanan'");
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