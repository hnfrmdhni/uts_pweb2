<?php
    session_start();
	// Membutuhkan file koneksi.php
	require 'koneksi.php';
	// Cek apakah user sudah login
	if (!isset($_SESSION['username'])) {
		header("location: index.php");
	}

	// Jika tombol Hapus ditekan
	if (isset($_GET['id'])) {
		// Query untuk menghapus data user berdasarkan id
		$id = $_GET['id'];
		$query = "DELETE FROM users WHERE id='$id'";
		$result = mysqli_query($koneksi, $query);

		if (!$result) {
			die("Data gagal dihapus.");
		}

		// Redirect ke halaman daftar pengguna
		header("location: admin.php");
	}
?>