<?php
// ============ 1 ============
// Definisikan variabel-variabel untuk koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'tpmodul2_tio'; // pastikan nama database sesuai yang ada di phpMyAdmin
$port = 3306;

// ============ 2 ============
// Buat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $db, $port);

// Cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // echo "Koneksi berhasil!"; // aktifkan ini kalau mau tes koneksi
}
?>
