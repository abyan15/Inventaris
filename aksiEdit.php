<?php 
include 'koneksi.php';

if (sizeof($_POST)!=0) {
	$nama = $_POST['nama'];
	$kategori = $_POST['kategori'];
	$jumlah = $_POST['jumlah'];
	$harga = $_POST['harga'];
	$tanggal_masuk = $_POST['tanggal_masuk'];

	$sql = "UPDATE tabel_barang SET kategori='$kategori', jumlah='$jumlah', harga='$harga', tanggal_masuk='$tanggal_masuk' WHERE nama='$nama'";

	if (mysqli_query($koneksi, $sql)) {
		header("location:index.php"); 
        exit();
	} else {
		echo "Error updating record: " . mysqli_error($koneksi);
	}
} 
echo '<pre>';
print_r($_POST);
echo '</pre>';
exit();

mysqli_close($koneksi);
