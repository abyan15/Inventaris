<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/style.css"> <!-- Menggunakan file CSS terpisah -->
</head>
<body>
    <?php
    include 'koneksi.php'; // Menghubungkan dengan file koneksi

    // Memeriksa apakah permintaan pencarian telah dikirim
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mendapatkan kata kunci pencarian dari formulir
        $search_keyword = $_POST['nama'];

        // Membuat query pencarian
        $sql = "SELECT * FROM tabel_barang WHERE nama LIKE '%$search_keyword%'";

        // Menjalankan query
        $result = mysqli_query($koneksi, $sql);

        // Memeriksa apakah hasil pencarian ditemukan
        if(mysqli_num_rows($result) > 0){
            // Tambahkan div untuk tabel responsif
            echo "<div class='container mt-3'>";
            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered table-hover'>";
            echo "<thead class='table-dark'>";
            echo "<tr>";
            echo "<th>Nama Barang</th>";
            echo "<th>Kategori Barang</th>";
            echo "<th>Jumlah Barang</th>";
            echo "<th>Harga Total</th>";
            echo "<th>Tanggal Masuk</th>";
            echo "<th>Aksi</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            // Loop untuk menampilkan data
            while($row = mysqli_fetch_array($result)){
                $hargaTotal = $row['harga'] * $row['jumlah']; // Hitung Harga Total
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                echo "<td>" . htmlspecialchars($row['kategori']) . "</td>";
                echo "<td>" . htmlspecialchars($row['jumlah']) . "</td>";
                echo "<td>Rp" . htmlspecialchars(number_format($hargaTotal, 0, '', '.')) . "</td>";
                echo "<td>" . htmlspecialchars(date('d F Y', strtotime($row['tanggal_masuk']))) . "</td>";
                echo "<td> 
                        <a href='edit.php?nama=". htmlspecialchars($row["nama"])."' class='btn btn-success btn-sm'>Ubah</a> 
                        <a href='delete.php?nama=". htmlspecialchars($row["nama"])."' class='btn btn-danger btn-sm'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>"; 
            echo "</div>"; 
        } else {
            // Menampilkan pesan jika barang tidak ditemukan
            echo "<div class='alert alert-danger text-center' role='alert'>Data tidak ditemukan</div>";
        }
    }

    // Tutup koneksi dengan database
    mysqli_close($koneksi);
    ?>
    <!-- Tombol back -->
    <div class="row">
        <div class="col-75">
            <a href="javascript:history.back()"><button class="btn btn-danger">Back</button></a>
        </div>
    </div>
</body>
</html>
