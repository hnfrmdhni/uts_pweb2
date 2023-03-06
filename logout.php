<?php
	// Menghapus session
	session_start();
	session_destroy();

	// Meredirect ke halaman login
	header("location: index.php");
?>