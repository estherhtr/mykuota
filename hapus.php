<?php 
// Fungsi untuk menajalankan SESSION
session_start();

// Sebelum user menghapus data dicek dulu apakah user sudah login atau belum
// Jika belum maka user akan dikembalikan ke halaman login
if (!isset($_SESSION["login"])) {
    header("location: login.php"); 
    exit;
}

include("koneksi.php");
// Mendapatkan kuota_id dari url
$kuota_id   = $_GET["kuota_id"];

// Melakukan perintah sql untuk menghapus data berdasarkan kuota_id
$sql        = "DELETE FROM pembelian_kuota WHERE kuota_id='$kuota_id'";
$query      = mysqli_query($conn, $sql);

// Jika berhasil akan diarahkan ke halaman transaksi.php dan menampilkan pesan berhasil
if ($query) {
    header("location: transaksi.php?delete=sukses");
    exit;
} else {
    header("location: transaksi.php?delete=error");
}

?>