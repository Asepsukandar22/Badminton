<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang</title>
</head>
<body>

<center>
        <h2>LAPORAN BOKING LAPANGAN BADMINTON CENTER</h2>
        <h4><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo date('d-M-Y', strtotime($_POST['tanggal_awal']));?></b> Sampai Dengan <b><?php echo date('d-M-Y', strtotime($_POST['tanggal_akhir']));?></b></i></h4>
        <hr/>
    </center>
    <table width="100%" border="2" cellpadding="0" cellspacing="0">
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
          include '../../inc/koneksi.php';
        //proses jika sudah klik tombol pencarian data
           if(isset($_POST['pencarian'])){
            //menangkap nilai form
             $tanggal_awal=$_POST['tanggal_awal'];
             $tanggal_akhir=$_POST['tanggal_akhir'];
			$query =mysqli_query($koneksi,"SELECT * FROM pemesanan INNER JOIN schedule_list ON pemesanan.id = schedule_list.id INNER JOIN lapangan ON schedule_list.id_lap = lapangan.id_lap WHERE pemesanan.tanggal between '$tanggal_awal' AND '$tanggal_akhir'");
            
            $no=1;
			while($data = mysqli_fetch_array($query)){
			?>
             <center><tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['kode_pesan']?></td>
                                        <td><?php echo $data['no_lap']?></td>
                                        <td><?php echo date('d-M-Y', strtotime($data['tanggal']));?></td>     
                                        <td><?php echo $data['jam']?></td>
                                        <td><?php echo "Rp." . number_format($data['harga']) ;?></td>
                                        <td><?php echo date('d-M-Y H:i:s', strtotime($data['start_datetime']));?></td>
                                        
                                        <td><?php echo $data['status_boking']?></td>                                        
                                        </<tr>
                                        </center>
                                        <?php
                                                $no++;
                                            }	
                                        }
                                                ?>
        </tbody>

    </table>

    <p></p>
    <script>
        window.print();
    </script>
</body>
</html>