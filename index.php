<?php
$host = 'localhost' ;
$db ='keuangan';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error){
    die("koneksi gagal: " . $conn->connect_error);
}
$type = $_POST['type'];
$amount = $_POST ['amount'];
if ($type && $amount) {
    $stmt = $conn->prepare("INSERT INTO transactions (type, amount) VALUES (?, ?)");
    $stmt->bind_param("sd", $type, $amount);

    if ($stmt->execute()) {
        echo "Transaksi berhasil ditambahkan";
    } else {
        echo "gagal menambahkan transaksi: " .$conn->error;
    }
    $stmt->close();
}
$conn->close();
?>