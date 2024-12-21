<?php 
include 'koneksi.php';

// menampilkan data yang sudah di input di dalam form
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];
$tanggal_masuk = $_POST['tanggal_masuk'];

$sql = "INSERT INTO tabel_barang (nama, kategori, jumlah, harga, tanggal_masuk) VALUES ('$nama', '$kategori', '$jumlah', '$harga', '$tanggal_masuk')";
if(mysqli_query($koneksi, $sql)) {
	echo "Barang berhasil ditambahkan";	
	header("location:index.php");
}
else 
{
	echo "Buku gagal ditambahkan";
}

// Close connection
mysqli_close($koneksi);
?>