<?php
include 'koneksi.php';
$sql = "SELECT * FROM tabel_barang WHERE nama='".$_GET['nama']."'";
if($result = mysqli_query($koneksi, $sql)){
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_array($result)){
			$nama = $row['nama'];
			$kategori = $row['kategori'];
			$jumlah = $row['jumlah'];
			$harga = $row['harga'];
			$tanggal_masuk = $row['tanggal_masuk'];
		}
		mysqli_free_result($result);
	} else{
		echo "No records matching your query were found.";
	}
} else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($koneksi);
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="CSS/add.css"> <!-- Menggunakan file CSS terpisah -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Tambah Data Barang</title>
  <script>
    function validateForm() {
      var jumlah = document.getElementById("jumlah").value;
      var harga = document.getElementById("harga").value;
      var tanggalMasuk = document.getElementById("tanggal_masuk").value;
      var today = new Date().toISOString().split('T')[0]; // Format YYYY-MM-DD

      if (jumlah <= 0 || harga <= 0) {
        alert("Jumlah Barang dan Harga harus angka positif.");
        return false;
      }

      if (tanggalMasuk > today) {
        alert("Tanggal masuk tidak boleh lebih dari tanggal hari ini.");
        return false;
      }
      return true; 
    }
  </script>
</head>
<body>
  <h1>Ubah Data Barang</h1>
  <div class="form-container">
    <form name="form" method="post" onsubmit="return validateForm()">
      <div class="row">
        <div class="col-25">
          <label for="nama">Nama Barang :</label>
        </div>
        <div class="col-75">
          <input id="nama" type="text" name="nama" value="<?php echo $nama;?>" readonly required>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="jumlah">Jumlah Barang:</label>
        </div>
        <div class="col-75">
          <input id="jumlah" type="number" name="jumlah" value="<?php echo $jumlah;?>" min="1" required>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="harga">Harga per Unit (Rp):</label>
        </div>
        <div class="col-75">
          <input id="harga" type="number" name="harga" value="<?php echo $harga;?>" min="100" required>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="kategori">Kategori Barang:</label>
        </div>
        <div class="col-75">
          <select id="kategori" name="kategori" required>
            <option value="" disabled selected>Pilih Kategori</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Pakaian">Pakaian</option>
            <option value="Makanan">Makanan</option>
            <option value="Lainnya">Lainnya</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="tanggal_masuk">Tanggal Masuk:</label>
        </div>
        <div class="col-75">
          <input id="tanggal_masuk" type="date" name="tanggal_masuk" value="<?php echo $tanggal_masuk;?>" max="<?php echo date('Y-m-d'); ?>" required>
        </div>
      </div>
      
      <br>
      <div class="row">      
        <button class="btn btn-success" name="TblUpdate" type="submit">Ubah Data</button><br>
      </div>
      <div class="row">      
        <a href="index.php" class="btn btn-danger">Kembali</a>
      </div>
    </form>
    
  </div>
</body>
<?php

if(isset($_POST["TblUpdate"])) {

	$nama = $_POST['nama'];
	$kategori = $_POST['kategori'];
	$jumlah = $_POST['jumlah'];
	$harga = $_POST['harga'];
	$tanggal_masuk = $_POST['tanggal_masuk'];

	$sql = "UPDATE tabel_barang SET kategori='$kategori', jumlah='$jumlah', 
			harga='$harga', tanggal_masuk='$tanggal_masuk' WHERE nama='$nama'";

	if (mysqli_query($koneksi, $sql)) {
		header("location:index.php");
	} else {
		echo "Error updating record: " . mysqli_error($koneksi);
	}
} 
mysqli_close($koneksi);
?>
</html>
