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
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #565e64;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Produk</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk:</label>
                <input type="text" id="nama_produk" name="nama_produk" value="<?= $data['nama_produk']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="number" id="harga" name="harga" step="0.01" value="<?= $data['harga']; ?>" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between">
                <a href="dua.php" class="btn btn-secondary">Update</a>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
    <!-- Link Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
