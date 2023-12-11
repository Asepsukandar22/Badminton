<?php
session_start();
include 'koneksi.php';
$email = $_POST['email']; 
$password = $_POST['password'];
$kode_member = $_POST['kode_member'];
$sql = mysqli_query($koneksi,"SELECT * FROM member WHERE email='$email' AND password='$password' AND kode_member='$kode_member' ");
$data = mysqli_fetch_array($sql);
$cek = mysqli_num_rows($sql);
if ($cek>0) {
	if ($data['akses']=="member") {  //databases akses
		$_SESSION['email']= $email; 
		$_SESSION['status']= "MEMBER";
		$_SESSION['id_member']=$data[0]; //database id
		header("location:../member/index.php");
	}else if($data['akses']=="kaprodi") {
		$_SESSION['username']= $username;
		$_SESSION['status']= "KAPRODI";
		$_SESSION['id_user']=$data[0];
		header("location:../kaprodi/index.php");
}
}else{
	?>
	<script type="text/javascript">
		alert("Akun Anda Ada Yang Salah");
		window.location="../index.php?=login";
	</script>
<?php
}
?>