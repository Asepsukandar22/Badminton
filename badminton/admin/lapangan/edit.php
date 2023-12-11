<?php
$id_lap = $_GET['id_lap'];
$query = mysqli_query($koneksi,"SELECT * FROM lapangan WHERE id_lap = '$id_lap' ");
$data = mysqli_fetch_array($query);
?>
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
                                    <input type="hidden" name="id_lap" value="<?php echo $data['id_lap']; ?>">
                                        <div class="form-group">
                                        <input type="text" class="form-control "placeholder="Masukan No Lapangan..." name="no_lap" require="Harap Diisi" value="<?php echo $data['no_lap'];?>">
                                        </div>
                                        <div class="form-group">
                                        <input type="text" class="form-control "placeholder="Masukan No Lapangan..." name="deskripsi" require="Harap Diisi" value="<?php echo $data['deskripsi'];?>">
                                        </div>
                                        <div class="form-group">
                                        <img src="img/<?php echo $data['foto'];?>" width="90" class="mb-2"><br>
                                            <input type="file" name="foto"  class="form-control">
                                            <input type="hidden" name="fotolama" value="<?php echo $data['foto'];?>" >
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
  
  $id_sarana = $_POST['id_sarana'];
  $no_lap = $_POST['no_lap'];
  $deskripsi = $_POST['deskripsi'];
  $fotolama = $_POST['fotolama'];
  $nama_file = $_FILES['foto']['name'];
  $source = $_FILES['foto']['tmp_name'];
  $folder = 'img/';

  if ($nama_file) {
    unlink('img/'.$fotolama);
    move_uploaded_file($source, $folder.$nama_file);
  $sql = mysqli_query($koneksi,"UPDATE lapangan SET no_lap='$no_lap',deskripsi='$deskripsi',
                                                    foto='$nama_file'
                                                    WHERE id_lap= '$id_lap'");
  }else{
    $sql = mysqli_query($koneksi,"UPDATE lapangan SET no_lap='$no_lap',deskripsi='$deskripsi'
                                                    WHERE id_lap= '$id_lap'");
  }

if ($sql) {
  ?>
    <script type="text/javascript">
      alert("Data Berhasil Di Edit");
      window.location ="index.php?pg=lapangan";
    </script>
    <?php
  }
}

 ?>
