
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
 
 
<!-- <span style='font-size:12pt'>No. : xxxxx, 11 Juni 2020 (user:xxxxx), 11:57:50</span></br> -->
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
<td>No</td>
<td>Item</td>
<td>Jumlah</td>
<td>Harga</td>
<td>Total</td><tr>
<td colspan='5'><hr></td></tr>
</tr>
<?php
include '../../inc/koneksi.php';		
$query =mysqli_query($koneksi,"SELECT * FROM penjualan INNER JOIN barang ON penjualan.id = barang.id INNER JOIN user ON penjualan.id_user = user.id_user");
$no=1;
while($data = mysqli_fetch_array($query)){
?>
<tr>
<td ><?php echo $no; ?></td>
<td ><?php echo $data['nama_barang']?></td>
<td ><?php echo $data['jumlah']?></td>
<td ><?php echo $data['harga_jual']?></td>
<td ><?php echo "Rp." . number_format($data['total']) ;?></td></tr>
<?php
                                                $no++;
                                            }	
                                                ?>

<tr>
<td colspan='5'><hr></td>
</tr>

<tr>
<td colspan = '4'><div style='text-align:right; color:black'>Total Bayar : </div></td><td style='text-align:right; font-size:14pt; color:black'><?php echo "Rp." . number_format($_POST['subtotal']);?></td>
</tr>
<tr>
<td colspan = '4'><div style='text-align:right; color:black'>Cash : </div></td><td style='text-align:right; font-size:14pt; color:black'><?php echo "Rp." . number_format($_POST['bayar']);?></td>
</tr>
<tr>
<td colspan = '4'><div style='text-align:right; color:black'>Kembalian : </div></td><td style='text-align:right; font-size:14pt; color:black'><?php echo "Rp." . number_format($_POST['kembalian']);?></td>
</tr>


</table>
<table style='width:350; font-size:12pt;' cellspacing='2'><tr></br><td align='center'>****** TERIMAKASIH ******</br></td></tr></table></center>
<script>
        window.print();
    </script>

</body>

</html>