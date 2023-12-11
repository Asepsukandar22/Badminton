<?php
include '../inc/koneksi.php';
session_start();
if ($_SESSION['status']!="KEPALA") {
	header("location:../index.php?pg=login");
}
$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user = '$id_user' ");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Badminton Center</title>
    <link rel="icon" type="image/png" sizes="40x16" href="../img/badminton.png">
   <!-- Custom fonts for this template -->
    <link href="../asets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- css untuk select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../asets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="../asets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                <img src="img/badminton.png" width="70" height="70">
                </div>
                <div class="sidebar-brand-text mx-3">Badminton <sup>Center</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="?pg=dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?pg=boking">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Verifikasi Boking</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Data Master
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="?pg=barang">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Barang</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?pg=lapangan">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Lapangan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?pg=personal">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data User</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?pg=personalmember">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Member</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTree4"
                    aria-expanded="true" aria-controls="collapseTwo4">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseTree4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan</h6>
                        <a class="collapse-item" href="?pg=laporanbarang">Penjualan</a>
                        <a class="collapse-item" href="?pg=laporanboking">Lapangan</a>
                    </div>
                </div>
            </li>
            


           
            <hr class="sidebar-divider">

            
           
            <!-- <li class="nav-item">
                <a class="nav-link" href="?pg=transaksi">
                    <i class="fas fa-dollar-sign"></i>
                    <span>Transaksi</span></a>
            </li> -->       
            

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



        </ul>
        <!-- End of Sidebar -->
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">              

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $data['nama_lengkap'] ?></span>
                                <img class="img-profile rounded-circle" src="../asets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../inc/logout.php" onclick="return confirm('Apakah Anda Akan Logout?')">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?php 
            switch (@$_GET['pg']) {
                case 'dashboard':
                include'dashboard/index.php';
                break;
                // ================================
                case 'personal':
                        include'user/index.php';
                        break;
                    case 'tambahuser':
                        include'user/tambah.php';
                        break;
                    case 'editdata':
                        include'user/edit.php';
                        break;
                // ====================================

                    case 'personalmember':
                        include'member/index.php';
                        break;
                    case 'tambahmember':
                        include'member/tambah.php';
                        break;
                    case 'editmember':
                        include'member/edit.php';
                        break;
                    
                // =======================================

                    case 'lapangan':
                        include'lapangan/index.php';
                        break;
                    case 'tambahlapang':
                        include'lapangan/tambah.php';
                        break;
                    case 'editlapang':
                        include'lapangan/edit.php';
                        break;
                  // =======================================                

                    case 'barang':
                    include'barang/index.php';
                    break;
                    case 'tambahbarang':
                    include'barang/tambah.php';
                    break;
                    case 'editbarang':
                    include'barang/edit.php';
                    break;
                    case 'tambahstok':
                    include'barang/stok.php';
                    break;
                    case 'transaksibarang':
                         include'transaksi/index.php';
                         break;
                    // =======================================
                    case 'kategori':
                    include'kategori/index.php';
                    break;
                    case 'editkategori':
                    include'kategori/edit.php';
                    break;
                    case 'tambahkategori':
                    include'kategori/tambah.php';
                    break;
                    // =======================================
                    case 'kategori':
                    include'kategori/index.php';
                    break;
                    case 'editkategori':
                    include'kategori/edit.php';
                    break;
                    case 'tambahkategori':
                    include'kategori/tambah.php';
                    break;

                    // =======================================
                    case 'harga':
                    include'harga/index.php';
                    break;
                    case 'editharga':
                    include'harga/edit.php';
                    break;
                    case 'tambahharga':
                    include'harga/tambah.php';
                    break;
                     // =======================================
                     case 'waktu':
                     include'waktu/index.php';
                     break;
                     case 'editwaktu':
                     include'waktu/edit.php';
                     break;
                     case 'tambahwaktu':
                     include'waktu/tambah.php';
                     break;
                     // =======================================
                     case 'jadwal':
                        include'jadwal/index.php';
                        break;
                        case 'boking':
                            include'boking/index.php';
                            break;
                        
                        case 'lihatjadwal':
                        include'jadwal/lihatjadwal.php';
                        break;
                        case 'editjadwal':
                        include'jadwal/edit.php';
                        break;
                        case 'tambahjadwal':
                        include'jadwal/tambah.php';
                        break;
                        case 'verifikasiboking':
                            include'boking/verifikasiboking.php';
                        break;
                        case 'verifikasipending':
                            include'boking/verifikasipending.php';
                        break;

                        case 'laporanbarang':
                            include'laporan/barang.php';
                            break;
                            case 'periodebarang':
                                include'laporan/periodebarang.php';
                                break;

                        case 'laporanboking':
                        include'laporan/boking.php';
                        break;
                        case 'periodeboking':
                        include'laporan/periodeboking.php';
                        break;

                default:
                include'dashboard/index.php';
                break;
            }
            ?>
                            
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="../asets/vendor/jquery/jquery.min.js"></script>
    <script src="../asets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../asets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../asets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../asets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../asets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../asets/js/demo/datatables-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#kota").select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select Barang"
                });
    
                
            });
        </script>
</body>

</html>