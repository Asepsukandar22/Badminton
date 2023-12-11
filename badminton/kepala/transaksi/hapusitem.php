<?php
include '../../inc/koneksi.php';
$id = $_GET['id'];
$id_penjualan = $_GET['id_penjualan'];
$databarang = mysqli_query($koneksi,"SELECT * FROM barang WHERE id='$id'");
$data      =mysqli_fetch_array($databarang);
$jual = mysqli_query($koneksi,"SELECT * FROM penjualan WHERE id_penjualan='$id_penjualan'");
$data2      =mysqli_fetch_array($jual);

$stok=$data['stok'];
$jumlah=$data2['jumlah'];

$stokbaru = $stok + $jumlah;
$upstok= mysqli_query($koneksi, "UPDATE barang SET stok='$stokbaru' WHERE id='$id'");

if ($upstok) {
    $hapus = mysqli_query($koneksi, "DELETE FROM penjualan WHERE id_penjualan = '$id_penjualan'");
  ?>
  <script type="text/javascript">
    alert("Data Berhasil Dihapus");
     window.location = "../index.php?pg=transaksibarang";
  </script>
  <?php 
}
?>