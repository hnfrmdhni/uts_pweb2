<?php
session_start();
// Membutuhkan file koneksi.php
require 'koneksi.php';

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("location: index.php");
}

// Mendapatkan data dari form
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$kelas = $_POST['kelas'];
$nim = $_POST['nim'];
$jurusan = $_POST['jurusan'];

// Cek apakah file diupload
if(isset($_FILES['file'])) {
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $tmp_name = $_FILES['file']['tmp_name'];

    // Set path untuk menyimpan file yang diupload
    $upload_dir = 'upload/';

    // Set format file yang diizinkan untuk diupload
    $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');

    // Mendapatkan ekstensi file yang diupload
    $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Cek apakah ekstensi file diizinkan untuk diupload
    if (in_array($ext, $allowed_ext)) {
        // Cek apakah ukuran file melebihi batas maksimal
        if ($file_size < 2000000) {
            // Generate nama file baru dengan menggunakan timestamp
            $new_name = time() . '_' . $file_name;

            // Pindahkan file yang diupload ke folder upload
            move_uploaded_file($tmp_name, $upload_dir . $new_name);

            // Query untuk mengupdate data user dengan file yang diupload
            $query = "UPDATE users SET Kelas='$kelas', NIM='$nim', Jurusan='$jurusan', file_name='$new_name' WHERE id='$id'";
            $result = mysqli_query($koneksi, $query);

            // Redirect ke halaman admin setelah berhasil mengupdate data user
            header("location: admin.php");
            exit;
        } else {
            echo "File terlalu besar!";
        }
    } else {
        echo "Format file tidak diizinkan!";
    }
} else {
    // Jika file tidak diupload, query untuk mengupdate data user tanpa file
    $query = "UPDATE users SET Kelas='$kelas', NIM='$nim', Jurusan='$jurusan' WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    // Redirect ke halaman admin setelah berhasil mengupdate data user
    header("location: admin.php");
    exit;
}
?>



