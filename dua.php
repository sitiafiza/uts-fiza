<?php
include 'koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM produk");

?>
<!DOCTYPE html>
<html>
<head>
<title>Data Produk</title>
<link rel="stylesheet" href="style2.css">
</head>
<body>
    <h2>Data Produk</h2>
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="create.php">Tambah Produk</a>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['nama_produk']; ?></td>
            <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
            <td>
                <a href="update.php?id=<?= $row['id']; ?>">Edit</a>
                <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus?');" style="color: #dc3545;">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
