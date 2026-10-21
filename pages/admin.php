<?php
// pages/admin.php - Dashboard admin sederhana untuk manajemen stok produk
require_once '../includes/functions.php';
require_once '../includes/sample.php';
require_once '../classes/produk.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - GlowBeauty</title>
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
        <h2>Dashboard Admin - Manajemen Stok Produk</h2>
        <p>Ringkasan inventaris produk kecantikan untuk pengelola toko.</p>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok Saat Ini</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            
            <tbody>   
                <?php
                for ($i = 0; $i < count($dataProduk); $i++) {
                    $item = $dataProduk[$i];
                ?>
                <tr>
                    <td><?= $i + 1; ?></td>
                    <td><?= $item['kode']; ?></td>
                    <td><?= bersihkanNamaProduk($item['nama']); ?></td>
                    <td><?= $item['kategori']; ?></td>
                    <td><?= formatRupiah($item['harga']); ?></td>
                    <td><strong><?= $item['stok']; ?> pcs</strong></td>
                    <td>
                        <span style="font-size: 13px; color: #757575; background: #fce4ec; padding: 4px 8px; border-radius: 4px;">Aktif</span>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div style="margin-top: 20px;">
            <a href="../index.php" class="btn" style="background-color: #b0bec5;">&larr; Kembali ke Beranda</a>
        </div>
    </div>
    <footer>
        <p>&copy; 2026 GlowBeauty Store</p>
    </footer>
</body>
</html>