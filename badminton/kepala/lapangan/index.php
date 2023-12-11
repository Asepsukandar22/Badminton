<div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Lapang</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Lapang</h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>No Lapangan</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $query =mysqli_query($koneksi,"SELECT * FROM lapangan ORDER BY id_lap DESC");
                                    $no=1;
                                    while($data = mysqli_fetch_array($query)){
                                    ?>	
                                        <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php
										if($data['foto'] == ""){
										?>
										<img src="img/badminton.png" width="40">
										<?php
										}
										else{
										?>
										<img class="rounded-square" src="img/<?php echo $data['foto'];?>" width="70"></td>
										<?php
										}
										?></td>
                                        <td><?php echo $data['no_lap']?></td>
                                        <td><?php echo $data['deskripsi']?></td>
                                        <td>
                                            <!-- <a href="?pg=boking&&id_lap=<?php echo $data[0];?>" class="btn btn-warning ">Boking</a> | -->
                                             <a href="?pg=lihatjadwal&&id_lap=<?php echo $data[0];?>" class="btn btn-primary ">Boking Jadwal</a></td>
                                           
                                        </<tr>
                                        <?php
                                                $no++;
                                            }	
                                                ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>No Lapangan</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                       
                                    </tfoot>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>