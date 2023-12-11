<?php
$id_harga = $_GET['id_harga'];
$query = mysqli_query($koneksi,"SELECT * FROM harga WHERE id_harga = '$id_harga' ");
$data = mysqli_fetch_array($query);
?>
<div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                             <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Edit Data</h1>
                                    </div>
                                    <form class="user" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                value="<?php echo $data['waktu'];?>" name="waktu" require="Harap Diisi">
                                        </div>
                                        <div class="form-group">
                                        <input type="number" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                value="<?php echo $data['harga'];?>" name="harga" require="Harap Diisi">
                                        </div>
                                                                               
                                        <input type="hidden" name="id_harga" value="<?php echo $data['id_harga'];?>">
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="edit">Simpan</button>
                                    </form>
                                    <hr>
                                     </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php 
if (isset($_POST['edit'])) {
  $waktu = $_POST['waktu'];
  $harga = $_POST['harga'];
  $sql= mysqli_query($koneksi,"UPDATE harga SET waktu='$waktu',harga='$harga' WHERE id_harga='$id_harga'");
  
if ($sql) {
  ?>
    <script type="text/javascript">
      alert("Data Berhasil Di Edit");
      window.location ="?pg=harga";
    </script>
    <?php
  }
}
?>