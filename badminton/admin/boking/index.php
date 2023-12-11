<div class="container-fluid">
                    
                    <!-- Page Heading -->
                    
                    <!-- <div class="alert alert-success" role="alert">
                                        <h4 class="alert-heading">Boking Lapangan</h4>
                                        <p>Sebelum Boking Lapangan Harap Untuk Dipilih Dulu Status Keanggotaan.</p>
                                        <hr>
                                        <p class="mb-0"><b>Daftarkan Disini  -></b>  <a href="?pg=bokinguser" class="btn btn-primary btn-sm">USER</a>  <a href="?pg=bokinguser" class="btn btn-warning btn-sm">MEMBER</a></p>
                                        </div> -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Verifikasi Boking </h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lapangan</th>
                                            <th>Nama Grup</th>
                                            
                                            <th>Jadwal Mulai</th>
                                            <th>Jadwal Selesai</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $query =mysqli_query($koneksi,"SELECT * FROM schedule_list INNER JOIN lapangan ON schedule_list.id_lap = lapangan.id_lap ORDER BY id DESC");
                                    $no=1;
                                    while($data = mysqli_fetch_array($query)){
                                    ?>	
                                        <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['no_lap']?></td>
                                        <td><?php echo $data['title']?></td>
                                        
                                        <td><?php echo date('d-M-Y H:i:s', strtotime($data['start_datetime']));?></td>
                                        <td><?php echo date('d-M-Y H:i:s', strtotime($data['end_datetime']));?></td>
                                        
                                        <td>
                                            <?php
                                            if($data['status_boking'] == "Boking"){
                                                ?>
                                                  <a href="?pg=verifikasiboking&&id=<?php echo $data[0];?>" class="btn btn-primary btn-sm"><?php echo $data['status_boking']?></a>
                                                <?php
                                            }elseif ($data['status_boking'] == "Pending") {
                                                ?>
                                                  <a href="?pg=verifikasipending&&id=<?php echo $data[0];?>" class="btn btn-warning btn-sm"><?php echo $data['status_boking']?></a>
                                                <?php
                                            }else {
                
                                                ?>
                                                
                                                <a href="laporan/stukboking.php?id=<?php echo $data[0]; ?>" onclick="return confirm('Sistem Akan Mencektak Struk?')" class="btn btn-success btn-sm" target="_blank"><i
                                                class="fas fa-print  text-white-50"> </i> <?php echo $data['status_boking']?></a>
                                                <?php
                                            }
                                            ?>
                                            
                                        </td>
                                        <td><a href="lapangan/hapus.php?id_lap=<?php echo $data[0]; ?>" onclick="return confirm('Yakin Data Akan Di Hapus?')" class="btn btn-danger btn-sm">Delete</a> 
                                           
                                            </td>
                                           
                                        </<tr>
                                        <?php
                                                $no++;
                                            }	
                                                ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th>No</th>
                                            <th>Nama Lapangan</th>
                                            <th>Nama Grup</th>
                                            
                                            <th>Jadwal Mulai</th>
                                            <th>Jadwal Selesai</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                       
                                    </tfoot>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


<?php

if (isset($_POST['status'])) {
  $id = $_POST['id'];
  if ($_POST['status_boking'] == "Pending") {
  $sql = mysqli_query($koneksi,"UPDATE schedule_list SET status = 'Lunas' WHERE id = '$id'");
  header("location:../index.php?pg=boking");
  }
  else{
   $sql = mysqli_query($koneksi,"UPDATE catatan SET status = 'Sampai' WHERE id_catatan = '$id_catatan'");
   header("location:index.php?pg=dashboard");
  } 
  
}
?>