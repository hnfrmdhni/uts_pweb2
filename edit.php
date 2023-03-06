<?php
    session_start();
	// Membutuhkan file koneksi.php
	require 'koneksi.php';
	// Cek apakah user sudah login
	if (!isset($_SESSION['username'])) {
		header("location: index.php");
	}

	// Mendapatkan id user dari parameter GET
	$id = $_GET['id'];

	// Query untuk mengambil data user berdasarkan id
	$query = "SELECT * FROM users WHERE id='$id'";
	$result = mysqli_query($koneksi, $query);
	$data = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<!-- CSS dari Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-12">
				<h1>Edit Data <?php echo $data['username']; ?></h1>
				<form method="POST" action="proses_edit.php" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="username" class="form-label">Username</label>
						<input type="text" class="form-control" id="username" name="username">
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" class="form-control" id="password" name="password">
					</div>
					<div class="mb-3">
						<label for="nim" class="form-label">NIM</label>
						<input type="text" class="form-control" id="nim" name="nim">
					</div>
					<div class="mb-3">
						<label for="kelas" class="form-label">Kelas</label>
						<input type="text" class="form-control" id="kelas" name="kelas">
					</div>
					<div class="mb-3">
						<label for="jurusan" class="form-label">Jurusan</label>
						<input type="text" class="form-control" id="jurusan" name="jurusan">
					</div>
					<div class="mb-3">
						<label for="gambar" class="form-label">Upload Gambar</label>
						<input type="file" class="form-control" id="file" name="file">
					</div>
					<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
    	<!-- JavaScript dari Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
		integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
		integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
	</script>
</body>
</html>