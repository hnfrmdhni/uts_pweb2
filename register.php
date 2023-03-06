<?php
	// Membutuhkan file koneksi.php
	require 'koneksi.php';

	// Cek apakah form telah disubmit
	if (isset($_POST['submit'])) {
		// Menyimpan data dari form ke dalam variabel
		$username = $_POST['username'];
		$password = $_POST['password'];
		$role = $_POST['role'];

		// Memeriksa apakah username sudah digunakan
		$cek_username = "SELECT * FROM users WHERE username = '$username'";
		$result = mysqli_query($koneksi, $cek_username);

		if (mysqli_num_rows($result) > 0) {
			echo "<script>alert('Username sudah digunakan, silahkan coba lagi');</script>";
		} else {
			// Menambahkan data ke database
			$query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
			mysqli_query($koneksi, $query);

			// Redirect ke halaman index.php
			echo "<script>alert('Akun berhasil dibuat');</script>";
			header("location: index.php");
		}
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Register</title>
	<!-- CSS dari Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<div class="card">
					<div class="card-header">
						<h1 class="text-center">Register</h1>
					</div>
					<div class="card-body">
						<form action="" method="post">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="username" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="role">Role</label>
								<select class="form-select" name="role" required>
									<option selected>Pilih Role...</option>
									<option value="user">User</option>
									<option value="admin">Admin</option>
								</select>
							</div>
							<div class="text-center mt-3">
								<button type="submit" name="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- JavaScript dari Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
	</script>
</body>

</html>