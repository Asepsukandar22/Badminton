<div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Member</h1>
                  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Member</h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>No Hp</th>
                                            <th>Kode Member</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
			$query =mysqli_query($koneksi,"SELECT * FROM member ORDER BY id_member DESC");
			$no=1;
			while($data = mysqli_fetch_array($query)){
			?>	
                                        <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['nm_lengkap']?></td>
                                        <td><?php echo $data['email']?></td>
                                        <td><?php echo $data['password']?></td>
                                        <td><?php echo $data['no_hp']?></td>
                                        <td><?php echo $data['kode_member']?></td>
                                       
                                        </<tr>
                                        <?php
                                        $no++;
                                         }	
                                         ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>No Hp</th>
                                            <th><b>Kode Member</b></th>
                                          
                                        </tr>
                                       
                                    </tfoot>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>