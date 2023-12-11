<?php
$id_jadwal = $_GET['id_jadwal'];
$query = mysqli_query($koneksi,"SELECT * FROM jadwal WHERE id_jadwal = '$id_jadwal' ");
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
                                                value="<?php echo $data['jam'];?>" name="jam" require="Harap Diisi" >
                                        </div>
                                        <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                value="<?php echo $data['jams'];?>" name="jams" require="Harap Diisi" >
                                        </div>
                                        <div class="form-group">
                                           <select name="id_harga" class="form-control">
                                            <option disabled selected> Pilih </option>
                                            <?php 
                                            $sql=mysqli_query($koneksi,"SELECT * FROM harga");
                                            while ($data2=mysqli_fetch_array($sql)) {
                                            ?>
                                            <option value="<?=$data2['id_harga']?>" selected="true"><?=$data2['harga']?></option> 
                                            <?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                                                               
                                        <input type="hidden" name="id_jadwal" value="<?php echo $data['id_jadwal'];?>">
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
  $id_jadwal = $_POST['id_jadwal'];
  $jam = $_POST['jam'];
  $jams = $_POST['jams'];
  $id_harga = $_POST['id_harga'];
  $sql= mysqli_query($koneksi,"UPDATE jadwal SET jam='$jam',id_harga='$id_harga',jams='$jams' WHERE id_jadwal='$id_jadwal'");
  
if ($sql) {
  ?>
    <script type="text/javascript">
      alert("Data Berhasil Di Edit");
      window.location ="?pg=waktu";
    </script>
    <?php
  }
}
?>