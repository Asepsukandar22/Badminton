<div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>
                    <a href="?pg=tambahbarang" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-2"><i
                                class="fas fa-download fa-sm text-white-50"></i>Tambah Data</a>
                    <!-- <a href="?pg=tambahstok" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm mb-2"><i
                                class="fas fa-download fa-sm text-white-50"></i>Tambah Stok</a> -->
                     
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Merek</th>
                                            <th>Kategori</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Satuan Barang</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
			
			$query =mysqli_query($koneksi,"SELECT * FROM barang ");
			$no=1;
			while($data = mysqli_fetch_array($query)){
			?>	

                                        <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['nama_barang']?></td>
                                        <td><?php echo $data['merk']?></td>
                                        <td><?php echo $data['id_kategori']?></td>
                                        <td><?php echo $data['harga_beli']?></td>
                                        <td><?php echo $data['harga_jual']?></td>
                                        <td><?php echo $data['satuan_barang']?></td>
                                        <td><?php echo $data['stok']?></td>
                                        <td>
                                            <?php
                                        $stok = $data['stok'];
                                        if ($stok < 5) {
                                            ?>
                                            <a href="?pg=tambahstok&&id=<?php echo $data[0];?>" class="btn btn-warning btn-sm" onclick="return confirm('Siap Menambahkan Stok')" >ReStok</a>
                                            <?php
                                        }else{
                                            ?>
                                            <a href="barang/hapus.php?id=<?php echo $data[0];?>" onclick="return confirm('Yakin Data Akan Di Hapus?')" class="btn btn-danger btn-sm">Delete</a> |
                                            <a href="?pg=editbarang&&id=<?php echo $data[0];?>" class="btn btn-primary btn-sm">Update</a>
                                            <?php
                                        }
                                            ?>
                                            </td>
                                           
                                        </<tr>
                                        <?php
                                                $no++;
                                            }	
                                                ?>
                                    </tbody>
                                    <tfoot>
                                    <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Merek</th>
                                            <th>Kategori</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Satuan Barang</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                    </tfoot>
                                    
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
