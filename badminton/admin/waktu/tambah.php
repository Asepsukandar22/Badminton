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
                                                placeholder="Masukan Waktu" name="jam" require="Harap Diisi">
                                        </div>
                                        <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukan Jam Selesai" name="jams" require="Harap Diisi">
                                        </div>
                                        <div class="form-group">
                                           <select name="id_harga" class="form-control">
                                            <option disabled selected> Pilih </option>
                                            <?php 
                                            $sql=mysqli_query($koneksi,"SELECT * FROM harga");
                                            while ($data2=mysqli_fetch_array($sql)) {
                                            ?>
                                            <option value="<?=$data2['id_harga']?>"><?=$data2['waktu']?> - <?=$data2['harga']?></option> 
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
									  $jam = $_POST['jam'];
                    $id_harga = $_POST['id_harga'];
                    $jams = $_POST['jams'];
									  $sql = mysqli_query($koneksi,"INSERT INTO jadwal VALUES ('','$jam','$id_harga','$jams','')");
									  if ($sql) {
									    ?>
									    <script type="text/javascript">
									      alert("Data Berhasil Di tambahkan");
									      window.location = "?pg=waktu";
									    </script>
									    <?php
									  }

									}
									?>