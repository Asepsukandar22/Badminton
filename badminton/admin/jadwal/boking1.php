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
                                        <h1 class="h4 text-gray-900 mb-4">Jadwal Lapangan <?php echo $data['no_lap']?></h1>
                                    </div>
                                    <form class="user" method="POST">
                                      <input type="date" class="form-control">
                                      <hr>
                                    <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Waktu</th>
      <th scope="col">Nama Custemer</th>
      <th scope="col">Status Boking</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>07.00-08.00</td>
      <td>Kurnia</td>
      <td><button class="btn btn-success">Boking</button></td>
    </tr>
    <tr>
    <tr>
      <td>2</td>
      <td>08.00-09.00</td>
      <td>Ramdan</td>
      <td><button class="btn btn-warning">Sedang</button></td>
    </tr>
    <tr>
    <tr>
      <td>3</td>
      <td>09.00-10.00</td>
      <td>Mirna</td>
      <td><button class="btn btn-danger">Selesai</button></td>
    </tr>
    <tr>
  </tbody>
</table> 



                                    </form>
                                    <hr>
                                     </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php 
if (isset($_POST['edit'])) {
  $id_member = $_POST['id_member'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $no_hp = $_POST['no_hp'];
  $sql= mysqli_query($koneksi,"UPDATE member SET nama_lengkap='$nama_lengkap',email='$email',password='$password',no_hp='$no_hp' WHERE id_member='$id_member'");
  
if ($sql) {
  ?>
    <script type="text/javascript">
      alert("Data Berhasil Di Edit");
      window.location ="?pg=personalmember";
    </script>
    <?php
  }
}
?>