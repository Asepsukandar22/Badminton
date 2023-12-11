<?php
$id_kategori = $_GET['id_kategori'];
$query = mysqli_query($koneksi,"SELECT * FROM kategori WHERE id_kategori = '$id_kategori' ");
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
                                                placeholder="Masukan Nama Lengkap..." name="nama_kategori" require="Harap Diisi" value="<?php echo $data['nama_kategori'];?>">
                                        </div>
                                                                               
                                        <input type="hidden" name="id_kategori" value="<?php echo $data['id_kategori'];?>">
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
  $id_kategori = $_POST['id_kategori'];
  $nama_kategori = $_POST['nama_kategori'];
  $tgl = date('Y-m-d');
  $sql= mysqli_query($koneksi,"UPDATE kategori SET nama_kategori='$nama_kategori',tgl_input='$tgl' WHERE id_kategori='$id_kategori'");
  
if ($sql) {
  ?>
    <script type="text/javascript">
      alert("Data Berhasil Di Edit");
      window.location ="?pg=kategori";
    </script>
    <?php
  }
}
?>