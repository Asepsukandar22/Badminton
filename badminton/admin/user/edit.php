<?php
$id_user = $_GET['id_user'];
$query = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user = '$id_user' ");
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
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukan Nama Lengkap..." name="nama_lengkap" require="Harap Diisi" value="<?php echo $data['nama_lengkap'];?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Masukan Email..."name="email" require="Harap Diisi" value="<?php echo $data['email'];?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password" require="Harap Diisi" value="<?php echo $data['password'];?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Masukan No.HP" name="no_hp" require="Harap Diisi" value="<?php echo $data['no_hp'];?>">
                                        </div>
                                        <input type="hidden" name="id_user" value="<?php echo $data['id_user'];?>">
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
  $id_user = $_POST['id_user'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $no_hp = $_POST['no_hp'];
  $sql= mysqli_query($koneksi,"UPDATE user SET nama_lengkap='$nama_lengkap',email='$email',password='$password',no_hp='$no_hp' WHERE id_user='$id_user'");
  
if ($sql) {
  ?>
    <script type="text/javascript">
      alert("Data Berhasil Di Edit");
      window.location ="?pg=personal";
    </script>
    <?php
  }
}
?>