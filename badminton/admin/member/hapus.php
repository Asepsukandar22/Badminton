<?php
include '../../inc/koneksi.php';
$id_member = $_GET['id_member'];
$sql = mysqli_query($koneksi, "DELETE FROM member WHERE id_member = '$id_member'");
if ($sql) {
  ?>
  <script type="text/javascript">
    alert("DATA BERHASIL DIHAPUS");
     window.location = "../index.php?pg=personalmember";
  </script>
  <?php 
}
 ?>