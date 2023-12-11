<?php
include '../../inc/koneksi.php';
$id_jadwal = $_GET['id_jadwal'];
$sql = mysqli_query($koneksi, "DELETE FROM jadwal WHERE id_jadwal = '$id_jadwal'");
if ($sql) {
  ?>
  <script type="text/javascript">
    alert("DATA BERHASIL DIHAPUS");
     window.location = "../index.php?pg=waktu";
  </script>
  <?php 
}
 ?>