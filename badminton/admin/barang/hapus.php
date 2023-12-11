<?php
include '../../inc/koneksi.php';
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "DELETE FROM barang WHERE id = '$id'");
if ($sql) {
  ?>
  <script type="text/javascript">
    alert("Data Berhasil Dihapus");
     window.location = "../index.php?pg=barang";
  </script>
  <?php 
}
 ?>