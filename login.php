<?php
    session_start();
	// Membutuhkan file koneksi.php
	require 'koneksi.php';

	// Mengambil data dari form
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Query untuk mengecek apakah ada user yang sesuai dengan username dan password
	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($koneksi, $query);

	// Menghitung jumlah baris hasil query
	$count = mysqli_num_rows($result);

	// Jika ada 1 baris, maka user ditemukan
    $_SESSION['username'] = $username;
	if ($count == 1) {
		// Mengambil data role dari database
		$data = mysqli_fetch_assoc($result);
		$role = $data['role'];

		// Jika role = "admin", maka akan diarahkan ke halaman admin.php
		if ($role == "admin") {
			header("location: admin.php");
		}
		// Jika role = "user", maka akan diarahkan ke halaman user.php
        else if ($role == "user") {
            header("location: user.php");
        }
    }
        // Jika tidak ada baris yang ditemukan, maka user tidak ditemukan
    else {
        // Menampilkan pesan error
        echo "Username atau password salah!";
    }
?>