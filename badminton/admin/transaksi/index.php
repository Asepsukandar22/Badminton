<h2 class="text-center text-bold"> Transaksi</h2>
<div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                        <div class="col-lg-12">    
                        
                                   
                            </div>
                             <div class="col-lg-5">
                             <h3 class="text-center">Pesan Barang</h3>
                                <div class="p-5">
                                
                                    <form class="user" method="POST">
                                       <div class="form-group">
                                        <select name="id" id="kota" class="form-control form-control-user">
                                        <option></option>
                                        <?php
                                        $query=mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id");
                                        while ($data2 = mysqli_fetch_array($query)) {
                                        ?>
                                        <option value="<?=$data2['id'];?>"><?php echo "Rp. ". $data2['harga_jual'];?> - <?php echo $data2['nama_barang'];?> - <?php echo $data2['stok'];?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <input type="number" class="form-control " placeholder="Jumlah" name="jumlah" require="Harap Diisi">
                                        </div>
                                                                               
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="simpanbarang">Simpan</button>
                                    </form>
                                   
                                     </div>
                            </div>
  <div class="col-lg-7">
    
 
    <h3 class="text-center">Keranjang</h3>
    
  <div class="p-5">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Barang</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Total</th>
      <th scope="col">Kasir</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
			
			$query =mysqli_query($koneksi,"SELECT * FROM penjualan INNER JOIN barang ON penjualan.id = barang.id INNER JOIN user ON penjualan.id_user = user.id_user");
			$no=1;
			while($data = mysqli_fetch_array($query)){
			?>	
      
    <tr>
      <th scope="row"><?php echo $no; ?></th>
      <td><?php echo $data['nama_barang']?></td>
      <td><?php echo $data['jumlah']?></td>
      <td><?php echo "Rp." . number_format($data['total']) ;?></td>
      <td><?php echo $data['nama_lengkap']?></td>
      <!-- <td><a href="transaksi/hapusitem.php?id=<?php echo $data[0];?>"class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a></td> -->
      
    </tr>
    <?php
     $no++;
      }	
      ?>
      
  </tbody>
</table>                                    
                                    <hr>

    <div class="row">
    <?php
                            include '../inc/koneksi.php';
                            $sql = mysqli_query($koneksi,"SELECT SUM(total) FROM penjualan");
                            $data3 = mysqli_fetch_array($sql);
                             ?>
    <div class="col-lg-6">
    <h4 class="text-danger text-left">Total Bayar : <?php echo "Rp." . number_format($data3['SUM(total)']) ;?></h4>
    </div>
    <div class="col-lg-6">
    <form method="POST">
    <input type="hidden" name="total" class="form-control" style="heigth:500px;" value="<?php echo $data3['SUM(total)'] ;?>">
    <input type="text" name="bayar" class="form-control" style="heigth:500px;" placeholder="Masukan Uang">
    </div>
    <?php
		if(isset($_POST['hitung'])){
      $kembalian = 0;
			$total = $_POST['total'];
			$bayar = $_POST['bayar'];
			$kembalian = $bayar-$total;
      if ($kembalian < 0) {
        ?>
        <div class="col-lg-6">
    <h4 class="text-primary text-left">Kembalian : <?php echo "Rp." . number_format('0') ;?></h4>
    </div>
        <?php
      }else{
        ?>
        <div class="col-lg-6">
        <h4 class="text-primary text-left">Kembalian : <?php echo "Rp." . number_format($kembalian) ;?></h4>
        </div>
        <?php
      }
		}
?>

    
    <div class="col-lg-6 mt-3">
      
    <button type="submit" name="hitung" class="btn btn-success btn-sm">Bayar</button>
     |
   <button type="submit" name="hapuskeranjang" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Akan Reset, Sebelumnya Pastikan Custemer Tidak Membutuhkan STRUK..')"> 
                                    Reset</button>
                                    </form> |
      <form action="laporan/struk.php" method="POST" target="_blank">
      <input type="hidden" value="<?= $data3['SUM(total)']?>" name="subtotal">
      <input type="hidden" value="<?= ($bayar); ?>" name="bayar">
      <input type="hidden" value="<?= ($kembalian); ?>" name="kembalian">
      <button type="submit" name="kirim" class="btn btn-primary btn-sm" >Struk</button>
    </form>
   
    </div>
      </div>                
                                 </<div>
                                 </div>    
    
                            </div>
                        </div>
                    </div>
                </div>
           
                <?php
									if (isset($_POST['simpanbarang'])) {
                    $id_user = $_SESSION['id_user'];
                    $id = $_POST['id'];
                    $jumlah = $_POST['jumlah'];
                    $tgl_input = date('Y-m-d');  
                    
                    $lihatdata = mysqli_query($koneksi,"SELECT * FROM barang WHERE id='$id'");
                    $data    =mysqli_fetch_array($lihatdata);
                    $harga_jual    =$data['harga_jual'];

                    $stok = $data['stok'];
                    // hitung
                    $sisa = $stok-$jumlah;
                    $tharga = $harga_jual * $jumlah;  

                    if ($stok < $jumlah) {
                      ?>
									    <script type="text/javascript">
									      alert("Maaf Stok Kurang Dari Jumlah");
									      window.location = "?pg=transaksibarang";
									    </script>
									    <?php
                    }else{
                      $insert = mysqli_query($koneksi,"INSERT INTO penjualan VALUES ('','$id','$id_user','$jumlah','$tharga','$tgl_input')");
                        if ($insert) {
                          $upstok= mysqli_query($koneksi, "UPDATE barang SET stok='$sisa' WHERE id='$id'");
                          ?>
                          <script type="text/javascript">
                            alert("Berhasil Di Tambahkan Keranjang");
                            window.location = "?pg=transaksibarang";
                          </script>
                          <?php
                        }
                    
									  }

									}
									?>

           




                  <?php
									if (isset($_POST['hapusitem'])) {
                    $id_penjualan = $_POST['id_penjualan'];
                    $id = $_POST['id'];
									  $jumlah = $_POST['jumlah'];
                    $lihatstok = mysqli_query($koneksi,"SELECT * FROM barang WHERE id='$id'");
                    $sto    =mysqli_fetch_array($lihatstok);
                    $stok    =$sto['stok'];
                    // hitung
                    $tstok = $stok + $jumlah;  
                    $hapus = mysqli_query($koneksi, "DELETE FROM penjualan WHERE id_penjualan = '$id_penjualan'");
									  if ($hapus) {
                      $sql= mysqli_query($koneksi,"UPDATE barang SET stok='$tstok' WHERE id='$id'");
									    ?>
									    <script type="text/javascript">
									      alert("Data Berhasil Dihapus");
									      window.location = "?pg=transaksibarang";
									    </script>
									    <?php
									  }

									}
									?>

<?php
									if (isset($_POST['hapusitem'])) {
                    $id_penjualan = $_POST['id_penjualan'];
                    $id = $_POST['id'];
									  $jumlah = $_POST['jumlah'];
                    
                    $lihatdata = mysqli_query($koneksi,"SELECT * FROM barang WHERE id='$id'");
                    $data    =mysqli_fetch_array($lihatdata);
                    $stok = $data['stok'];

                    // hitung
                    $sisa = $stok+$jumlah;
                    $sql = mysqli_query($koneksi, "DELETE FROM penjualan WHERE id_penjualan = '$id_penjualan'");
                    if ($sql) {
                      $upstok= mysqli_query($koneksi, "UPDATE barang SET stok='$sisa' WHERE id='$id'");
                      ?>
                      <script type="text/javascript">
                        alert("Berhasil Di Tambahkan Keranjang");
                        window.location = "?pg=transaksibarang";
                      </script>
                      <?php
                    }else{
                      ?>
                      <script type="text/javascript">
                        alert("Transaksi Error");
                      </script>
                      <?php
                    }

									}
									?>

<?php
                                    if (isset($_POST['hapuskeranjang'])) {
                                                                      
                                        $sql = mysqli_query($koneksi, "INSERT INTO nota SELECT * FROM penjualan");                           
                                      if ($sql) {
                                        $hapus = mysqli_query($koneksi, "DELETE  FROM penjualan"); 
                                        ?>
                                        <script type="text/javascript">
                                          alert("Data Berhasil Di Hapus!");
                                          window.location = "?pg=transaksibarang";
                                        </script>
                                        <?php
                                      }

                                    }
                                    ?>

                                    <?php
                                    if (isset($_POST['bayarbarang'])) {
                                      $kembalian = 0;
                                      $bayar = $_POST['bayar'];
                                      $total = $_POST['total'];
                                     
                                      $kembalian = $bayar - $total;

                                      if ($bayar < $total) {
                                        ?>
                                        <script type="text/javascript">
                                          alert("Maaf Uang Anda Tidak Cukup");
                                          window.location = "?pg=transaksibarang";
                                        </script>
                                        <?php
                                      }else{
                                       
                                          if ($kembalian) {
                                            ?>
                                            <script type="text/javascript">
                                              alert("Pembayaran berhasil");
                                              window.location = "?pg=transaksibarang";
                                            </script>
                                            <?php
                                          }
                                      
                                      }
                  
                                    }
                                    ?>