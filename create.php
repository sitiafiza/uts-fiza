<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama_produk = mysqli_real_escape_string($conn, $_POST['nama_produk']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);

    $query = "INSERT INTO produk (nama_produk, harga) VALUES ('$nama_produk', '$harga')";
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="styless.css">
    
</head>
<body>
    <div class="form-container">
        <h2>Tambah Produk</h2>
        <form method="POST" action="create.php">
            <label>Nama Produk:</label>
            <input type="text" name="nama_produk" required>
            <label>Harga:</label>
            <input type="number" name="harga" step="0.01" required>
            <button type="submit" name="submit">Simpan</button>
        </form>
        <a href="index.php">Kembali</a>
    </div>
</body>
</html>
