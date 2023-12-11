


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
                                    $query = mysqli_query($koneksi, "SELECT max(kode_member) as kodeTerbesar FROM member");
                                    $data = mysqli_fetch_array($query);
                                    $kode_member = $data['kodeTerbesar'];
                                    $urutan = (int) substr($kode_member, 3, 3);
                                    $urutan++;                                       
                                    $huruf = "BCB";
                                    $kode_member = $huruf . sprintf("%03s", $urutan);

                                    ?>
                                        <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukan Nama Lengkap..." name="nm_lengkap" require="Harap Diisi">
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
                                        <input type="hidden" name="akses" value="member">
                                        <input type="hidden" name="kode_member" value="<?php echo $kode_member ?>">
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
									  $nm_lengkap = $_POST['nm_lengkap'];
									  $email = $_POST['email'];
									  $password = $_POST['password'];
									  $no_hp = $_POST['no_hp'];
									  $akses = $_POST['akses'];  
                                      $kode_member = $_POST['kode_member'];  
									  $sql = mysqli_query($koneksi,"INSERT INTO member VALUES ('','$nm_lengkap','$email','$password','$no_hp','$kode_member','$akses')");
									  if ($sql) {
									    ?>
									    <script type="text/javascript">
									      alert("Akun Berhasil Di tambahkan");
									      window.location = "?pg=personalmember";
									    </script>
									    <?php
									  }

									}
									?>