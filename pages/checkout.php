<?php
// pages/checkout.php - Halaman checkout menggunakan perulangan DO-WHILE (P6) untuk validasi pembayaran
require_once '../includes/functions.php';
require_once '../includes/sample.php';

// Simulasi total belanja dan diskon menggunakan prosedural
$totalBelanja = 285000; 
$diskon = hitungDiskonProsedural($totalBelanja);
$totalBayar = $totalBelanja - $diskon;

// Simulasi validasi konfirmasi menggunakan struktur DO-WHILE minimal sekali eksekusi
$statusPembayaran = "";
$percobaan = 0;
do {
    $percobaan++;
    $konfirmasiValid = true; 
    if ($konfirmasiValid) {
        $statusPembayaran = "Pembayaran berhasil diverifikasi oleh sistem pada percobaan ke-" . $percobaan;
    }
} while (!$konfirmasiValid && $percobaan < 1);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - GlowBeauty</title>
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
        <h2>Konfirmasi Pembayaran & Checkout</h2>
        <p>Selesaikan pesanan produk kecantikan Anda di sini.</p>

        <div class="summary-box">
            <h3>Ringkasan Transaksi</h3>
            <p>Subtotal Belanja: <strong><?= formatRupiah($totalBelanja); ?></strong></p>
            <p>Diskon Member/Belanja: <span style="color: #c2185b;"><strong>- <?= formatRupiah($diskon); ?></strong></span></p>
            <hr style="border: 0; border-top: 1px solid var(--pink-light);">
            <p style="font-size: 18px; color: var(--pink-deep);"><strong>Total Yang Harus Dibayar: <?= formatRupiah($totalBayar); ?></strong></p>
        </div>

        <div style="margin-top: 20px; background: #ffffff; border: 1px solid var(--border-color); padding: 15px; border-radius: 8px;">
            <h4 style="margin-top: 0; color: var(--pink-deep);">Status Sistem:</h4>
            <p style="margin-bottom: 0; color: green; font-weight: 500;"><?= $statusPembayaran; ?></p>
        </div>

        <div style="margin-top: 25px; text-align: right;">
            <a href="admin.php" class="btn">Selesaikan Pesanan & Lihat Admin &rarr;</a>
        </div>
    </div>
    <footer>
        <p>&copy; 2026 GlowBeauty Store</p>
    </footer>
</body>
</html>