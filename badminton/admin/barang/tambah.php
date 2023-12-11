


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
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT max(id_barang) as kodeTerbesar FROM barang");
                                    $data = mysqli_fetch_array($query);
                                    $id_barang = $data['kodeTerbesar'];
                                    $urutan = (int) substr($id_barang, 3, 3);
                                    $urutan++;                                       
                                    $huruf = "BR";
                                    $id_barang = $huruf . sprintf("%03s", $urutan);

                                    ?>
                                        
                                        <div class="form-group">
                                        <input type="text" name="id_barang" value="<?php echo $id_barang ?>"  class="form-control" disabled="" >
                                        </div>
                                        <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                                placeholder="Masukan Nama Barang..." name="nama_barang" require="Harap Diisi">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" placeholder="Masukan Merk" name="merk" require="Harap Diisi">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user" placeholder="Masukan Harga Beli" name="harga_beli" require="Harap Diisi">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user" placeholder="Masukan Harga Jual" name="harga_jual" require="Harap Diisi">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" placeholder="Masukan Satuan Barang" name="satuan_barang" require="Harap Diisi">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user" placeholder="Masukan STOK" name="stok" require="Harap Diisi">
                                        </div>
                                        <div class="form-group">
                                           <select name="id_kategori" class="form-control">
                                            <option disabled selected> Pilih </option>
                                            <?php 
                                            $sql=mysqli_query($koneksi,"SELECT * FROM kategori");
                                            while ($data2=mysqli_fetch_array($sql)) {
                                            ?>
                                            <option value="<?=$data2['id_kategori']?>"><?=$data2['nama_kategori']?></option> 
                                            <?php
                                            }
                                            ?>
                                            </select>
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
                                      $id_barang = $_POST['id_barang'];
									  $id_kategori = $_POST['id_kategori'];                                      
									  $nama_barang = $_POST['nama_barang'];
									  $merk = $_POST['merk'];
									  $harga_beli = $_POST['harga_beli'];
									  $harga_jual = $_POST['harga_jual'];
									  $satuan_barang = $_POST['satuan_barang'];  
                                      $stok = $_POST['stok'];  
                                      $tgl_input = date('Y-m-d');  
									  $sql = mysqli_query($koneksi,"INSERT INTO barang VALUES ('','$id_barang','$id_kategori','$nama_barang','$merk','$harga_beli'
                                      ,'$harga_jual','$satuan_barang','$stok','$tgl_input')");
									  if ($sql) {
									    ?>
									    <script type="text/javascript">
									      alert("Akun Berhasil Di tambahkan");
									      window.location ="?pg=barang";
									    </script>
									    <?php
									  }

									}
									?>