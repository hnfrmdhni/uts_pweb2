<?php
	// Menghubungkan ke database dengan username "root" dan nama database "pweb2"
	$koneksi = mysqli_connect("localhost", "root", "", "pweb2");

	// Cek apakah koneksi berhasil
	if (!$koneksi) {
		die("Koneksi gagal: " . mysqli_connect_error());
	}
?>