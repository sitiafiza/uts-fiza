<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];

    $update = mysqli_query($conn, "UPDATE produk SET nama_produk='$nama_produk', harga='$harga' WHERE id='$id'");
    
    if ($update) {
        header("Location: index.php");
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h2>Edit Produk</h2>
    <form method="POST" action="">
        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" value="<?= $data['nama_produk']; ?>" required><br><br>
        <label>Harga:</label><br>
        <input type="number" name="harga" step="0.01" value="<?= $data['harga']; ?>" required><br><br>
        <button type="submit" name="update">Update</button>
    </form>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>