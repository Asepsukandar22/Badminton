<div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Laporan Penjualan Barang</h1>
                    <a href="?pg=periodeboking" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-2"><i
                                class="fas fa-print fa-sm text-white-50"> </i> Cetak Laporan</a>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Pesan</th>
                                            <th>Nama Lapangan</th>
                                            <th>Tgl. Transaksi</th>
                                            <th>Jumlah Jam</th>
                                            <th>Harga </th>
                                            <th>Jadwal Boking</th>
                                            <th>Status</th>

                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
			
			$query =mysqli_query($koneksi,"SELECT * FROM pemesanan INNER JOIN schedule_list ON pemesanan.id = schedule_list.id INNER JOIN lapangan ON schedule_list.id_lap = lapangan.id_lap WHERE pemesanan.id_pemesanan ORDER BY jam DESC ");
			$no=1;
			while($data = mysqli_fetch_array($query)){
			?>	

                                        <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['kode_pesan']?></td>
                                        <td><?php echo $data['no_lap']?></td>
                                        <td><?php echo date('d-M-Y', strtotime($data['tanggal']));?></td>     
                                        <td><?php echo $data['jam']?></td>
                                        <td><?php echo "Rp." . number_format($data['harga']) ;?></td>
                                        <td><?php echo date('d-M-Y H:i:s', strtotime($data['start_datetime']));?></td>
                                        
                                        <td><button class="btn btn-success" ><?php echo $data['status_boking']?></button></td>                                        
                                        </<tr>
                                        <?php
                                                $no++;
                                            }	
                                                ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                    <th>No</th>
                                    <th>Kode Pesan</th>
                                            <th>Nama Lapangan</th>
                                            <th>Tgl. Transaksi</th>
                                            <th>Jumlah Jam</th>
                                            <th>Harga </th>
                                            <th>Jadwal Boking</th>
                                            <th>Status</th>
                                            
                                            
                                        </tr>
                                       
                                    </tfoot>
                                    
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


              