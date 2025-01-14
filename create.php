<?php 
include 'koneksi.php';

// Tambahkan logika untuk menyimpan data
if (isset($_POST['submit'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];

    // Query untuk menyimpan data
    $query = "INSERT INTO produk (nama_produk, harga) VALUES ('$nama_produk', '$harga')";

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil disimpan!'); window.location.href='dua.php';</script>";
    } else {
        echo "<script>alert('Data gagal disimpan: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="styless.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Masukkan Pesanan Anda</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Nama Produk:</label>
                <input type="text" name="nama_produk" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga:</label>
                <input type="number" name="harga" step="0.01" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
            <div class="col-md-6 text-lg-end">
                <a href="dua.php" class="btn btn-primary">Lihat Data Pemesan</a>
            </div> 
        </form>
    </div>
</body>
</html>
