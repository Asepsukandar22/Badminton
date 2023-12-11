<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang</title>
</head>
<body>

<center>
        <h2>LAPORAN PENJUALAN BARANG BADMINTON CENTER</h2>
        <h4><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo date('d-M-Y', strtotime($_POST['tanggal_awal']));?></b> Sampai Dengan <b><?php echo date('d-M-Y', strtotime($_POST['tanggal_akhir']));?></b></i></h4>
        <hr/>
    </center>
    <table width="100%" border="2" cellpadding="0" cellspacing="0">
        <thead>
        <tr>
                <th>No</td> 
                <th>Nama Barang</td> 
                <th>Merk Barang</td> 
                <th>Kategori</td> 
                <th>Stok Akhir</td>
                <th>Jumlah Terjual</td>
                <th>Harga Jual</td> 
                
                       
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
			$query =mysqli_query($koneksi,"SELECT * FROM nota INNER JOIN barang ON nota.id = barang.id INNER JOIN kategori ON barang.id_kategori = kategori.id_kategori WHERE nota.tgl_input between '$tanggal_awal' AND '$tanggal_akhir'");
            
            $no=1;
			while($data = mysqli_fetch_array($query)){
			?>
            <tr style="text-align:center;">
                <td><?php echo $no; ?></td>
                <td><?php echo $data['nama_barang']?></td>
                <td><?php echo $data['merk']?></td>
                <td><?php echo $data['nama_kategori']?></td>
                <td><?php echo $data['stok']?></td>
                <td><?php echo $data['jumlah']?></td>
                <td style="text-align:left;"><?php echo "Rp." . number_format($data['harga_jual']) ;?></td>
            </tr>
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