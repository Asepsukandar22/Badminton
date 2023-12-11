<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM barang WHERE id = '$id' ");
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
                                      <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                                      <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                        value="<?php echo $data['nama_barang'];?>" name="nama_barang" require="Harap Diisi" >
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" value="<?php echo $data['merk'];?>" name="merk" require="Harap Diisi">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user" value="<?php echo $data['harga_beli'];?>" name="harga_beli" require="Harap Diisi">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user" value="<?php echo $data['harga_jual'];?>" name="harga_jual" require="Harap Diisi">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" value="<?php echo $data['satuan_barang'];?>" name="satuan_barang" require="Harap Diisi">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user" value="<?php echo $data['stok'];?>" name="stok" require="Harap Diisi">
                                        </div>
                                        <div class="form-group">
                                           <select name="id_kategori" class="form-control">
                                            <option disabled selected> Pilih </option>
                                            <?php 
                                            $sql=mysqli_query($koneksi,"SELECT * FROM kategori");
                                            while ($data2=mysqli_fetch_array($sql)) {
                                            ?>
                                            <option value="<?=$data2['id_kategori']?>" selected="true"><?=$data2['nama_kategori']?></option> 
                                            <?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                                                               
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="edit">Simpan</button>
                                    </form>
                                    <hr>
                                     </div>
                            </div>
                        </div>
                    </div>
                
                <?php 
if (isset($_POST['edit'])) {
  $id = $_POST['id'];
  $nama_barang = $_POST['nama_barang'];
  $merk = $_POST['merk'];
  $harga_beli = $_POST['harga_beli'];
  $harga_jual = $_POST['harga_jual'];
  $satuan_barang = $_POST['satuan_barang'];
  $stok = $_POST['stok'];
  $id_kategori = $_POST['id_kategori'];
  $sql= mysqli_query($koneksi,"UPDATE barang SET id_kategori='$id_kategori', nama_barang='$nama_barang',merk='$merk',harga_beli='$harga_beli'
  ,harga_jual='$harga_jual',satuan_barang='$satuan_barang',stok='$stok' WHERE id='$id'");
  
if ($sql) {
  ?>
    <script type="text/javascript">
      alert("Data Berhasil Di Edit");
      window.location ="?pg=barang";
    </script>
    <?php
  }
}
?>