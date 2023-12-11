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
                                                placeholder="Masukan Nama Lengkap..." name="nama_lengkap" require="Harap Diisi">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Masukan Email..."name="email" require="Harap Diisi">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password" require="Harap Diisi">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Masukan No.HP" name="no_hp" require="Harap Diisi">
                                        </div>
                                        <input type="hidden" name="akses" value="user">
                                        
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
									  $nama_lengkap = $_POST['nama_lengkap'];
									  $email = $_POST['email'];
									  $password = $_POST['password'];
									  $no_hp = $_POST['no_hp'];
									  $akses = $_POST['akses'];  
									  $sql = mysqli_query($koneksi,"INSERT INTO user VALUES ('','$nama_lengkap','$email','$password','$no_hp','$akses')");
									  if ($sql) {
									    ?>
									    <script type="text/javascript">
									      alert("Akun Berhasil Di tambahkan");
									      window.location = "?pg=personal";
									    </script>
									    <?php
									  }

									}
									?>