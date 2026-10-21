<?php
// pages/produk.php - Katalog produk menggunakan perulangan FOR (P7) & Nested FOR untuk rating
require_once '../includes/functions.php';
require_once '../includes/sample.php';
require_once '../classes/Produk.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk - GlowBeauty</title>
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
        <h2>Katalog Produk Kecantikan</h2>
        <p>Daftar lengkap produk skincare dan makeup pilihan terbaik kami.</p>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status Stok</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Perulangan FOR utama untuk merender tabel produk
                for ($i = 0; $i < count($dataProduk); $i++) {
                    $prod = new Produk(
                        $dataProduk[$i]['kode'],
                        $dataProduk[$i]['nama'],
                        $dataProduk[$i]['harga'],
                        $dataProduk[$i]['stok'],
                        $dataProduk[$i]['kategori'],
                        $dataProduk[$i]['gambar']
                    );
                ?>
                <tr>
                    <td><?= $i + 1; ?></td>
                    <td><?= $prod->kode; ?></td>
                    <td><img src="../assets/images/<?= htmlspecialchars($prod->gambar); ?>" alt="<?= htmlspecialchars($prod->nama); ?>" style="width: 80px; height: 80px;"></td>
                    <td><strong><?= bersihkanNamaProduk($prod->nama); ?></strong></td>
                    <td><?= $prod->kategori; ?></td>
                    <td><?= formatRupiah($prod->harga); ?></td>
                    <td><?= $prod->cekStatusStok(); ?></td>
                    <td>
                        <?php
                        // Nested FOR untuk mencetak rating bintang (1 sampai 5)
                        for ($s = 1; $s <= 5; $s++) {
                            if ($s <= $dataProduk[$i]['rating']) {
                                echo '<span class="star">&#9733;</span>';
                            } else {
                                echo '<span style="color: #ccc;">&#9734;</span>';
                            }
                        }
                        ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div style="margin-top: 20px; text-align: right;">
            <a href="keranjang.php" class="btn">Lanjut ke Keranjang &rarr;</a>
        </div>
    </div>
    <footer>
        <p>&copy; 2026 GlowBeauty Store. Pemrograman Berbasis Web</p>
    </footer>
</body>
</html>