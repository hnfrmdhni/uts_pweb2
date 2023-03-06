<?php
    session_start();
	// Membutuhkan file koneksi.php
	require 'koneksi.php';
	// Cek apakah user sudah login
	if (!isset($_SESSION['username'])) {
		header("location: index.php");
	}

	// Query untuk mengambil data user
	$query = "SELECT * FROM users WHERE role ='user'";
	$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Admin</title>
	<!-- CSS dari Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.2/datatables.min.css" />

<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-12">
				<h1>Daftar Pengguna</h1>
				<table class="table table-bordered dataTable">
					<thead>
						<tr>
							<th scope="col">Username</th>
							<th>Password</th>
							<th>Kelas</th>
							<th>NIM</th>
							<th>Jurusan</th>
							<th>Foto</th>
							<th>Role</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<!-- Menampilkan data user -->
						<?php while ($data = mysqli_fetch_array($result)) { ?>
						<tr>
							<td><?php echo $data['username']; ?></td>
							<td><?php echo $data['password']; ?></td>
							<td><?php echo $data['Kelas']; ?></td>
							<td><?php echo $data['NIM']; ?></td>
							<td><?php echo $data['Jurusan']; ?></td>
							<td><img src="upload\<?php echo $data['file_name']; ?>" width="100" height="100"></td>
							<td><?php echo $data['role']; ?></td>
							<td>
								<!-- Tombol Upload -->
								<a href="upload.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">Upload</a>
								<!-- Tombol edit -->
								<a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">Edit</a>
								<!-- Tombol hapus -->
								<a href="hapus.php?id=<?php echo $data['id']; ?>" class="btn btn-danger"
									onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<!-- Tombol Logout -->
				<a href="logout.php" class="btn btn-danger">Logout</a>
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
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.2/datatables.min.js"></script>
	<script>
		$(document).ready(function () {
			$('table').DataTable();
		});
	</script>
</body>

</html>