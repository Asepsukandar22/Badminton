<!-- LOGOUT -->
<?php
session_start();
session_destroy();
?>
	<script type="text/javascript">
		alert("Anda Berhasil Logout");
		window.location="../index.php?pg=login";
	</script>

<!-- ========= -->