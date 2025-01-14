<?php
include 'koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM produk");
?>
<!DOCTYPE html>
<html>
<head>
<!-- Bootstrap CSS dari Themewagon (di dalam folder bootstrap/css) -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

<!-- Custom Style dari Themewagon -->
<link rel="stylesheet" href="assets/css/style.css">

    <title>Data Produk</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h2 {
            text-align: center;
            color: rgb(151, 149, 43);
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: rgb(151, 149, 43);
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color:rgb(179, 141, 17);
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: rgb(151, 149, 43);
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td a {
            color:rgb(202, 243, 18);
            font-weight: bold;
            margin-right: 10px;
        }

        td a:hover {
            color: #0056b3;
        }

        /* Responsive Table */
        @media screen and (max-width: 600px) {
            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            th, td {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
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
