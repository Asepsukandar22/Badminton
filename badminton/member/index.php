<?php
include '../inc/koneksi.php';
session_start();
if ($_SESSION['status']!="MEMBER") {
	header("location:../index.php?pg=login");
}
$id_member = $_SESSION['id_member'];
$query = mysqli_query($koneksi,"SELECT * FROM member WHERE id_member = '$id_member' ");
$data = mysqli_fetch_array($query);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Badminton Center</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="icon" type="image/png" sizes="40x16" href="../img/badminton.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
  <script src="https://unpkg.com/feather-icons"></script>
  
</head>

<body>
  <!-- Navbar -->
  <div class="container">
    <nav class="navbar fixed-top bg-body-secondary navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="../img/badminton.png" alt="Logo" width="70" height="70" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item ">
              <a class="nav-link active" aria-current="page" href="?pg=home">Home</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="?pg=tata_cara" >Tata Cara</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="?pg=lapangan">Penjadwalan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="?pg=pembayaran">Pembayaran</a>
            </li>
            
            
          </ul>
          <a href="../inc/logout.php" onclick="return confirm('Apakah Anda Akan Logout?')" class="btn btn-danger btn-lg"><i data-feather="user"></i> <?php echo $data['nama_lengkap'];?></a>   
        </div>
      </div>
    </nav>
  </div>
  <!-- End Navbar -->
  
  <?php 
  switch (@$_GET['pg']) {
    case 'home':
      include'content/home.php';
      break;
      case 'pembayaran':
        include'content/pembayaran.php';
        break;
      case 'lapangan':
        include'content/lapangan.php';
        break;
        
        case 'jadwal':
          include'content/jadwal.php';
        break;
        
        case 'tata_cara':
          include'content/tata_cara.php';
        break;
        
    default:
    include'content/home.php';
      break;
  }
  
  ?>

  <!-- footer -->
  <!-- <footer> -->
    <!-- <div class="social">
      <a href="#"><i data-feather="instagram"></i></a>
      <a href="#"><i data-feather="facebook"></i></a>
      <a href="#"><i data-feather="twitter"></i></a>
    </div> -->

    <!-- <div class="links">
      <a href="#home">Home</a>
      <a href="#about">Lapangan</a>
      <a href="#menu">Pembayaran</a>
      <a href="#contact">Kontak</a>
    </div> -->

    <!-- <div class="credit"> -->
      <!-- <p>Created by <a href="#">Asep Sukanda</a> &copy; 2023</p> -->
    <!-- </div>
  </footer> -->
  <!-- End Footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script>
    feather.replace();
  </script>
</body>

</html>
