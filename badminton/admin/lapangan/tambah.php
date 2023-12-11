<div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                             <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Tambah Data</h1>
                                    </div>
                                    <form class="user" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                        <input type="text" class="form-control "
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukan No Lapangan..." name="no_lap" require="Harap Diisi">
                                        </div>
                                        <div class="form-group">
                                        <textarea class="form-control" name="deskripsi" require="Harap Diisi" placeholder="Masukan Deskripsi..."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="foto"  class="form-control">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="simpan">Simpan</button>
                                    </form>
                                    <hr>
                                     </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
if (isset($_POST['simpan'])) {
  $no_lap = $_POST['no_lap'];
  $deskripsi = $_POST['deskripsi'];
  $nama_file = $_FILES['foto']['name'];
  $source = $_FILES['foto']['tmp_name'];
  $folder = 'img/';
  move_uploaded_file($source, $folder.$nama_file);
  $sql = mysqli_query($koneksi,"INSERT INTO lapangan VALUES ('','$no_lap','$deskripsi','$nama_file')");
if ($sql) {
  ?>
    <script type="text/javascript">
      alert("Data Berhasil Di Tambahakan");
      window.location ="index.php?pg=lapangan";
    </script>
    <?php
  }
}
 ?>