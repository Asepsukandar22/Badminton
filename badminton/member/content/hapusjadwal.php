<?php
include '../../inc/koneksi.php';
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "DELETE FROM schedule_list WHERE id = '$id'");
if ($sql) {
  ?>
  <script type="text/javascript">
    alert("Jadwal Data Berhasil Dihapus");
     window.location = "../index.php?pg=pembayaran";
  </script>
  <?php 
}
 ?>