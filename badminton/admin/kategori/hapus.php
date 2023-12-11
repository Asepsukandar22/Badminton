<?php
include '../../inc/koneksi.php';
$id_kategori = $_GET['id_kategori'];
$sql = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori = '$id_kategori'");
if ($sql) {
  ?>
  <script type="text/javascript">
    alert("DATA BERHASIL DIHAPUS");
     window.location = "../index.php?pg=kategori";
  </script>
  <?php 
}
 ?>