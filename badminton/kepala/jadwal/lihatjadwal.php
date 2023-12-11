<?php 
$id_lap = $_GET['id_lap'];
$schedules = $koneksi->query("SELECT * FROM schedule_list inner join lapangan ON schedule_list.id_lap = lapangan.id_lap Where lapangan.id_lap='$id_lap'");
$sched_res = [];
foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
    $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
    $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
    $sched_res[$row['id']] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduling</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../cal/css/bootstrap.min.css">
    <link rel="stylesheet" href="../cal/fullcalendar/lib/main.min.css">
    <script src="../cal/js/jquery-3.6.0.min.js"></script>
    <script src="../cal/js/bootstrap.min.js"></script>
    <script src="../cal/fullcalendar/lib/main.min.js"></script>
    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            font-family: Apple Chancery, cursive;
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }
        table, tbody, td, tfoot, th, thead, tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
    </style>
</head>
            
<body class="bg-light">
    


        <div class="row">
        
            <h2 class="text-head text-center">BOKING LAPANGAN <span></span></h2>
            <hr>
            
           
            <div class="col-md-12">
                <div id="calendar"></div>
            </div>
            <!-- <div class="col-md-3">
                <div class="cardt rounded-0 shadow">
                    <div class="card-header bg-gradient bg-primary text-light">
                        <h5 class="card-title">Schedule Form</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form action="save_schedule.php" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Title</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description" class="control-label">Description</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" required></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Start</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label">End</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" required>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> Save</button>
                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel</button>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Boking Lapang <?php echo $row['no_lap'];?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
        <div class="row">
            
            <input type="hidden" name="statusboking" value="Boking">
            <input type="hidden" class="form-control" value="<?php echo $row['id_lap'];?>" name="id_lap">
            <div class="col-12">
            <label for="">Nama Klub</label>
            <input type="text" class="form-control" name="nama_klub">
            </div>
            
            <div class="col-6">
            <label for="">Tanggal Boking</label>
            <input type="date" class="form-control" name="tgl_boking">
            </div>
            
            
            <div class="col-6">
            <label for="">Jam Boking</label>
            <select name="id_jadwal" class="form-control">
            <option disabled selected> Pilih </option>
                <?php 
                 $sql=mysqli_query($koneksi,"SELECT * FROM jadwal");
                 while ($data2=mysqli_fetch_array($sql)) {
                 ?>
                 <option value="<?=$data2['id_jadwal']?>"> <?=$data2['jam']?></option> 
                  <?php
                     }
                    ?>
                  </select>
            </div>
                                  
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="boking">Boking Jadwal</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php
			if (isset($_POST['boking'])) {
                        $tgl_sekarang = date('Y-m-d');
                        $id_lap = $_POST['id_lap'];
                        
                        $id_member="NULL";
                        $id_user="NULL";
                       
                        $nama_klub = $_POST['nama_klub'];
                        $tgl_boking = $_POST['tgl_boking'];
                        $id_jadwal = $_POST['id_jadwal'];                       
                        $statusboking = $_POST['statusboking'];
                        $lihatjadwal = mysqli_query($koneksi,"SELECT * FROM jadwal INNER JOIN harga ON jadwal.id_harga = harga.id_harga WHERE jadwal.id_jadwal='$id_jadwal'");
                        $jamharga    =mysqli_fetch_array($lihatjadwal);

                        $jam    =$jamharga['jam'];
                        $start_datetime = date('Y-m-d H:i:s', strtotime("$tgl_boking $jam"));

                        $end_datetime = date('Y-m-d H:i:s',strtotime('+1 hour',strtotime($start_datetime)));
                       
                       
                        if ($tgl_boking < $tgl_sekarang) {
                            ?>
                            <script type="text/javascript">
							alert("Tanggal Boking Tidak Boleh Kurang Dari Hari Ini");
							window.location = "?pg=lapangan";
							</script>
							<?php
                          }else{
                            $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM schedule_list WHERE start_datetime='$start_datetime' or end_datetime='$end_datetime'"));
                            if ($cek > 0) {
                                ?>
                                    <script type="text/javascript">
                                    alert("Jadwal Sudah Ada Yang Boking");
                                    window.location = "?pg=lapangan";
                                    </script>
                                    <?php
                            }else{
                            $sql = mysqli_query($koneksi,"INSERT INTO schedule_list VALUES ('','$nama_klub','$start_datetime','$end_datetime','$id_lap','$id_user','$id_member','$id_jadwal','$statusboking')");
                                if ($sql){
                                    ?>
                                    <script type="text/javascript">
                                    alert("Berhasil Di Boking");
                                    window.location = "?pg=boking";
                                </script>
                                <?php
                                }
                             }
                        }
                    }
                        ?>




    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Schedule Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Nama Klub</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            
                            <dt class="text-muted">Mulai Boking</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">Selesai Boking</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

    


<?php 
if(isset($koneksi)) $koneksi->close();
?>
</body>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="../cal/js/script.js"></script>

</html>
