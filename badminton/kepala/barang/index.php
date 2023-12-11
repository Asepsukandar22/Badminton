<div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>
                    
                     
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
                                            
                                    </tfoot>
                                    
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
