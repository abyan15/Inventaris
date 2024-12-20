<?php
// Menghubungkan dengan koneksi
include 'koneksi.php';

// Nama file yang akan diunduh
$filename = "data_barang" . ".csv";

// Header untuk download file CSV
header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=$filename");

// Membuka output untuk menulis data
$output = fopen('php://output', 'w');

// Menulis header kolom ke file CSV
fputcsv($output, ['Nama Barang', 'Kategori Barang', 'Jumlah Barang', 'Harga Total', 'Tanggal Masuk']);

// Query untuk mengambil data
$sql = "SELECT * FROM barang.tabel_barang";
$result = mysqli_query($koneksi, $sql);

// Loop melalui hasil query dan tulis ke CSV
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $hargaTotal = $row['harga'] * $row['jumlah']; // Hitung Harga Total
        fputcsv($output, [
            $row['nama'],
            $row['kategori'],
            $row['jumlah'],
            number_format($hargaTotal, 0, '', '.'),
            date('d F Y', strtotime($row['tanggal_masuk']))
        ]);
    }
}

// Menutup koneksi database
mysqli_close($koneksi);

// Menutup output
fclose($output);
exit();
?>
