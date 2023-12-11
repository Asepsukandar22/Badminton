<?php
include '../../inc/koneksi.php';
$id_pemesanan = $_GET['id_pemesanan'];
$query = mysqli_query($koneksi,"SELECT * FROM pemesanan INNER JOIN schedule_list ON pemesanan.id = schedule_list.id INNER JOIN lapangan ON schedule_list.id_lap = lapangan.id_lap INNER JOIN member ON pemesanan.id_member = member.id_member WHERE id_pemesanan = '$id_pemesanan' ");
$data = mysqli_fetch_array($query);
?>
<html>
<head>
<title>Faktur Pembayaran</title>
<style>
 
#tabel
{
font-size:15px;
border-collapse:collapse;
}
#tabel  td
{
padding-left:5px;
border: 1px solid black;
}
</style>
</head>
<body style='font-family:tahoma; font-size:8pt;'>
<center><table style='width:350px; font-size:16pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='70%' align='CENTER' vertical-align:top'><span style='color:black;'>
<b>BADMINTON CENTER</b></br>JL XXXXXXXXXXX XXXXXXX</span></br>
<hr>

 
<!-- <span style='font-size:12pt'>No. : xxxxx, 11 Juni 2020 (member:xxxxx), 11:57:50</span></br> -->
</td>
</table>
<style>
hr { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
} 
</style>

<table cellspacing='0' cellpadding='0' style='width:350px; font-size:12pt; font-family:calibri;  border-collapse: collapse;' border='0'>
<tr>
<td>Kode Pesan</td>
<td>:</td>
<td><?php echo $data['kode_pesan']?></td>
</tr>
<tr>
<tr>
<td>Nama Lapangan</td>
<td>:</td>
<td><?php echo $data['no_lap']?></td>
</tr>
<tr>
<td>Jadwal Mulai</td>
<td>:</td>
<td><?php echo date('d-M-Y H:i:s', strtotime($data['end_datetime']));?></td>
</tr>
<tr>
<td>Jadwal Selesai</td>
<td>:</td>
<td><?php echo date('d-M-Y H:i:s', strtotime($data['start_datetime']));?></td>
</tr>

<td>Harga</td>
<td>:</td>
<td><?php echo "Rp. " . number_format($data['harga']) ;?></td>
</tr>
<tr>
<td>DP</td>
<td>:</td>
<td><?php echo "Rp. " . number_format($data['dp']) ;?></td>
</tr>
<tr>
<td>Sisa Bayar</td>
<td>:</td>
<td><?php echo "Rp. " . number_format($data['sisa']) ;?></td></tr>
</tr>
<tr>
<td colspan='5'><hr></td>
</tr>

<!-- <tr>
<td colspan = '4'><div style='text-align:right; color:black'>Total Bayar : </div></td><td style='text-align:right; font-size:14pt; color:black'><?php echo "Rp." . number_format($_POST['subtotal']);?></td>
</tr>
<tr>
<td colspan = '4'><div style='text-align:right; color:black'>Cash : </div></td><td style='text-align:right; font-size:14pt; color:black'><?php echo "Rp." . number_format($_POST['bayar']);?></td>
</tr>
<tr>
<td colspan = '4'><div style='text-align:right; color:black'>Kembalian : </div></td><td style='text-align:right; font-size:14pt; color:black'><?php echo "Rp." . number_format($_POST['kembalian']);?></td>
</tr> -->


</table>
<table style='width:350; font-size:12pt;' cellspacing='2'><tr></br><td align='center'>****** TERIMAKASIH ******</br></td></tr></table></center>
<script>
        window.print();
    </script>

</body>

</html>