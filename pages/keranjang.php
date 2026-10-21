<?php
// pages/keranjang.php - Halaman keranjang menggunakan perulangan WHILE (P5)
require_once '../includes/functions.php';
require_once '../includes/sample.php';
require_once '../classes/Keranjang.php';

// Inisialisasi objek Keranjang
$keranjang = new Keranjang();
$keranjang->tambahItem($dataProduk[0]['nama'], $dataProduk[0]['harga'], 2);
$keranjang->tambahItem($dataProduk[1]['nama'], $dataProduk[1]['harga'], 1);

// Mengambil daftar item dan total belanja dari objek Keranjang
$daftarBelanja = $keranjang->getDaftarItem();
$grandTotal = $keranjang->hitungTotal();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - GlowBeauty</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <a href="../index.php" class="logo">🌸 GlowBeauty Store</a>
        <nav>
            <a href="../index.php">Beranda</a>
            <a href="produk.php">Katalog Produk</a>
            <a href="keranjang.php">Keranjang</a>
            <a href="checkout.php">Checkout</a>
            <a href="admin.php">Admin Panel</a>
        </nav>
    </header>
    <div class="container">
        <h2>Keranjang Belanja Anda</h2>
        <p>Berikut adalah ringkasan produk yang Anda pilih.</p>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga Satuan</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $counter = 0;
                // Menggunakan perulangan WHILE untuk menampilkan item keranjang
                while ($counter < count($daftarBelanja)) {
                    $item = $daftarBelanja[$counter];
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($item['nama']); ?></td>
                    <td><?= formatRupiah($item['harga']); ?></td>
                    <td><?= $item['qty']; ?> pcs</td>
                    <td><strong><?= formatRupiah($item['subtotal']); ?></strong></td>
                </tr>
                <?php
                    $counter++;
                }
                ?>
            </tbody>
        </table>

        <div class="summary-box">
            <p style="margin: 0; font-size: 16px;"><strong>Total Belanja: <?= formatRupiah($grandTotal); ?></strong></p>
        </div>

        <div style="margin-top: 20px; display: flex; justify-content: space-between;">
            <a href="produk.php" class="btn" style="background-color: #b0bec5;">&larr; Belanja Lagi</a>
            <a href="checkout.php" class="btn">Lanjut ke Checkout &rarr;</a>
        </div>
    </div>
    <footer>
        <p>&copy; 2026 GlowBeauty Store</p>
    </footer>
</body>
</html>