<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM barang WHERE id = '$id' ");
$data = mysqli_fetch_array($query);
?>
<div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                             <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Tambah Data</h1>
                                    </div>
                                    <form class="user" method="POST">
                                      <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                                    <div class="form-group">
                                      <input type="text" class="form-control form-control-user" value="<?php echo $data['nama_barang'];?>" disabled="">
                                        </div>
                                        <div class="form-group">
                                        <input type="text" class="form-control form-control-user" value="<?php echo $data['stok'];?>" disabled="">
                                        </div>             
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user" placeholder="Masukan Tambah Stok" name="stokakhir" require="Harap Diisi">
                                        </div>                             
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="simpanstok">Simpan</button>
                                    </form>
                                    <hr>
                                     </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
									if (isset($_POST['simpanstok'])) {
                    $id = $_POST['id'];
									  $stokakhir = $_POST['stokakhir'];
                    $lihatstok = mysqli_query($koneksi,"SELECT * FROM barang WHERE id='$id'");
                    $sto    =mysqli_fetch_array($lihatstok);
                    $stok    =$sto['stok'];
                    // hitung
                    $tstok = $stok + $stokakhir;  

                    $sql= mysqli_query($koneksi,"UPDATE barang SET stok='$tstok' WHERE id='$id'");
									  if ($sql) {
									    ?>
									    <script type="text/javascript">
									      alert("Stok Berhasil Di tambahkan");
									      window.location = "?pg=barang";
									    </script>
									    <?php
									  }

									}
									?>
                                     