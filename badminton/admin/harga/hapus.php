<?php
include '../../inc/koneksi.php';
$id_harga = $_GET['id_harga'];
$sql = mysqli_query($koneksi, "DELETE FROM harga WHERE id_harga = '$id_harga'");
if ($sql) {
  ?>
  <script type="text/javascript">
    alert("Data Berhasil Dihapus");
     window.location = "../index.php?pg=harga";
  </script>
  <?php 
}
 ?>