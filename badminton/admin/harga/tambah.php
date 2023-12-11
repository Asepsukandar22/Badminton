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
                                                placeholder="Masukan Nama Waktu" name="waktu" require="Harap Diisi">
                                        </div>
                                        <div class="form-group">
                                        <input type="number" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukan Harga" name="harga" require="Harap Diisi">
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
									  $waktu = $_POST['waktu'];
                    $harga = $_POST['harga'];
									  $sql = mysqli_query($koneksi,"INSERT INTO harga VALUES ('','$waktu','$harga')");
									  if ($sql) {
									    ?>
									    <script type="text/javascript">
									      alert("Data Berhasil Di tambahkan");
									      window.location = "?pg=harga";
									    </script>
									    <?php
									  }

									}
									?>