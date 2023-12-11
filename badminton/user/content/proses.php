            <?php
            session_start();
		    include '../../inc/koneksi.php';

                    $tgl_sekarang = date('Y-m-d');
                    $id_user = $_SESSION['id_user'];
                    $id_lap = $_POST['id_lap'];

                    $id_jadwal = $_POST['id_jadwal'];
                    $nama_klub = $_POST['nama_klub'];
                    
                    $tgl_boking = $_POST['tgl_boking'];
                    
                    $lihatjadwal = mysqli_query($koneksi,"SELECT * FROM jadwal INNER JOIN harga ON jadwal.id_harga = harga.id_harga WHERE jadwal.id_jadwal='$id_jadwal'");
                    $jamharga    =mysqli_fetch_array($lihatjadwal);

                    $jam    =$jamharga['jam'];
                    $start_datetime = date('Y-m-d H:i:s', strtotime("$tgl_boking $jam"));

                    $end_datetime = date('Y-m-d H:i:s',strtotime('+3 hour',strtotime($start_datetime)));
                    $inputjadwal = mysqli_query($koneksi,"INSERT INTO schedule_list VALUES ('','$nama_klub','$start_datetime','$end_datetime','$id_lap','$id_user','','$id_jadwal')");
                    if ($inputjadwal) {
                        ?>
                        <script type="text/javascript">
                            alert("DATA BERHASIL Ditambah");
                            window.location = "../index.php?pg=pembayaran";
                        </script>
                        <?php
                    }
									
				?>