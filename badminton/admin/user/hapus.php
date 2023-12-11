<?php
include '../../inc/koneksi.php';
$id_user = $_GET['id_user'];
$sql = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$id_user'");
if ($sql) {
  ?>
  <script type="text/javascript">
    alert("DATA BERHASIL DIHAPUS");
     window.location = "../index.php?pg=personal";
  </script>
  <?php 
}
 ?>