<?php
    session_start();
	// Membutuhkan file koneksi.php
	require 'koneksi.php';

	// Query untuk mengambil data user
	$query = "SELECT * FROM users WHERE role ='user'";
	$result = mysqli_query($koneksi, $query);
	
	// Cek apakah user sudah login
    	if (!isset($_SESSION['username'])) {
		header("location: index.php");
	}
    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>User</title>
	<!-- CSS dari Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 mt-5">
				<h3>Selamat datang !, <?php echo $username; ?></h3>
				<p>Ini adalah halaman user</p>
				<!-- Tombol Logout -->
				<a href="logout.php" class="btn btn-danger">Logout</a>
			</div>
		</div>
	</div>

	<!-- JavaScript dari Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script></body>
</html>

