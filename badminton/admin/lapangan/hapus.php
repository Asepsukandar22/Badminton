<?php
include '../../inc/koneksi.php';
$id_lap = $_GET['id_lap'];
$tampil = mysqli_query($koneksi, "SELECT * FROM lapangan WHERE id_lap = '$id_lap'");
$data = mysqli_fetch_array($tampil);
$fotolama = $data['foto'];
unlink('../img/'.$fotolama);
$sql = mysqli_query($koneksi, "DELETE FROM lapangan WHERE id_lap = '$id_lap'");
if ($sql) {
  ?>
  <script type="text/javascript">
    alert("DATA BERHASIL DIHAPUS");
     window.location = "../index.php?pg=lapangan";
  </script>
  <?php 
}
 ?>
