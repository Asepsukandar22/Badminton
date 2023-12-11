<?php
session_start();
include 'koneksi.php';
$email = $_POST['email']; 
$password = $_POST['password']; 
$sql = mysqli_query($koneksi,"SELECT * FROM user WHERE email='$email'AND password='$password' ");
$data = mysqli_fetch_array($sql);
$cek = mysqli_num_rows($sql);
if ($cek>0) {
	if ($data['akses']=="admin") {  //databases akses
		$_SESSION['email']= $email; 
		$_SESSION['status']= "ADMIN";
		$_SESSION['id_user']=$data[0]; //database id
		header("location:../admin/index.php");
	}else if($data['akses']=="user") {
		$_SESSION['email']= $email;
		$_SESSION['status']= "USER";
		$_SESSION['id_user']=$data[0];
		header("location:../user/index.php");
	}else if($data['akses']=="kepala") {
		$_SESSION['email']= $email;
		$_SESSION['status']= "KEPALA";
		$_SESSION['id_user']=$data[0];
		header("location:../kepala/index.php");
}
}else{
	?>
	<script type="text/javascript">
		alert("Akun Anda Ada Yang Salah");
		window.location="../index.php";
	</script>
<?php
}
?>