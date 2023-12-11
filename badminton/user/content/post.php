
        <?php   
        session_start();
        include '../../inc/koneksi.php';
					if (isset($_POST['boking'])) {
                        $tgl_sekarang = date('Y-m-d');

                        $id_user = $_SESSION['id_user'];
                        $id_lap = $_POST['id_lap'];
                        $nama_klub = $_POST['nama_klub'];
                        $tgl_boking = $_POST['tgl_boking'];
                        $id_jadwal = $_POST['id_jadwal'];                       
                        $statusboking = $_POST['statusboking'];

                        $lihatjadwal = mysqli_query($koneksi,"SELECT * FROM jadwal INNER JOIN harga ON jadwal.id_harga = harga.id_harga WHERE jadwal.id_jadwal='$id_jadwal'");
                        $jamharga    =mysqli_fetch_array($lihatjadwal);

                        $jam    =$jamharga['jam'];
                        $start_datetime = date('Y-m-d H:i:s', strtotime("$tgl_boking $jam"));
    
                        $end_datetime = date('Y-m-d H:i:s',strtotime('+1 hour',strtotime($start_datetime)));
                       
                        $sql = mysqli_query($koneksi,"INSERT INTO schedule_list VALUES ('','$nama_klub','$start_datetime','$end_datetime','$id_lap','$id_user','NULL','$id_jadwal','$statusboking')");
                                if ($sql){
                                    ?>
                                    <script type="text/javascript">
                                    alert("Berhasil Di Boking");
                                   
                                    window.location = "../index.php?pg=pembayaran";
                                </script>
                                <?php
                                }
                             }
                    
                
                        ?>