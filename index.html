<!DOCTYPE html>
<html>
<head>
  <title>SISTEM MANAJEMEN INVENTARIS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="CSS/style.css"> <!-- Menggunakan file CSS terpisah -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .floating-box {
      position: fixed;
      top: 20px;
      left: 50%;  
      transform: translateX(-50%); 
      background-color: rgba(40, 167, 69, 0.7); 
      color: white;
      padding: 15px;
      border-radius: 5px;
      display: none;
      z-index: 9999;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
    }
  </style>
</head>
<body>
  <div class="header">
    <img src="Asset/list.png" alt="Inventaris" width="100px" height="100px">
    <h1>SISTEM MANAJEMEN INVENTARIS</h1> 
  </div>

  <div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <a class="btn btn-success" href="add.php" role="button">Tambah Data +</a>
      <form action="caribarang.php" method="post" id="nama" class="d-flex">
        <input type="text" placeholder="Cari Barang" name="nama" class="form-control me-2">
        <button type="submit" class="btn btn-success">
          <i class="bi bi-search"></i> Cari
        </button>
      </form>
    </div>
  
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead class="table-dark">
          <tr>
            <th>Nama Barang</th>
            <th>Kategori Barang</th>
            <th>Jumlah Barang</th>
            <th>Harga Total</th>
            <th>Tanggal Masuk</th>
            <th>Aksi</th>
          </tr>
        </thead>
      <tbody>
        <?php
        include 'koneksi.php';
        $sql = "SELECT * FROM barang.tabel_barang"; 
        if($result = mysqli_query($koneksi, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $hargaTotal = $row['harga'] * $row['jumlah'];
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
            } else {
                echo "<tr><td colspan='6' class='text-center'>Tidak ada data yang ditemukan.</td></tr>";
            }
        } else {
            echo "<tr><td colspan='6' class='text-center'>Gagal mengeksekusi query.</td></tr>";
        }
        mysqli_close($koneksi);
        ?>
      </tbody>
      </table>
      <a href="export_csv.php" class="btn btn-success mb-3 float-end">Download Tabel</a>
    </div>
  </div>

  <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
    <div class="floating-box">
      Data telah dihapus
    </div>
    <script>
      document.querySelector('.floating-box').style.display = 'block';
      setTimeout(function() {
        document.querySelector('.floating-box').style.display = 'none';
      }, 3000); 
    </script>
  <?php endif; ?>
</body>
</html>
