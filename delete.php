<?php
include 'koneksi.php';

if (isset($_GET['nama'])) {
    $nama = $_GET['nama'];
    $sql = "DELETE FROM tabel_barang WHERE nama='" . mysqli_real_escape_string($koneksi, $nama) . "'";

    if (mysqli_query($koneksi, $sql)) {
        header("location:index.php?status=success");
    } else {
        echo "Error deleting record: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
?>
