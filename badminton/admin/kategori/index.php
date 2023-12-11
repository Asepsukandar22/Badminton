<div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Kategori</h1>
                    <a href="?pg=tambahkategori" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-2"><i
                                class="fas fa-download fa-sm text-white-50"></i>Tambah Data</a>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Tanggal Input</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
			
			$query =mysqli_query($koneksi,"SELECT * FROM kategori ORDER BY nama_kategori DESC");
			$no=1;
			while($data = mysqli_fetch_array($query)){
			?>	

                                        <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['nama_kategori']?></td>
                                        <td><?php echo $data['tgl_input']?></td>
                                        
                                        <td><a href="kategori/hapus.php?id_kategori=<?php echo $data[0];?>" onclick="return confirm('Yakin Data Akan Di Hapus?')" class="btn btn-danger btn-sm">Delete</a> |
                                            <a href="?pg=editkategori&&id_kategori=<?php echo $data[0];?>" class="btn btn-primary btn-sm">Update</a></td>
                                           
                                        </<tr>
                                        <?php
                                                $no++;
                                            }	
                                                ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Tanggal Input</th>
                                            <th>Aksi</th>
                                        </tr>
                                       
                                    </tfoot>
                                    
                                </table>
                            </div>
                        </div>
                    </div>

                </div>