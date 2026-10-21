<?php
// index.php - Halaman Utama E-Commerce
require_once 'includes/functions.php';
require_once 'includes/sample.php';
require_once 'classes/produk.php';
require_once 'includes/header.php';
?>

<h1>Selamat Datang di GlowBeauty Store</h1>
<p>Destinasi terpercaya untuk produk kecantikan, skincare, dan makeup berkualitas tinggi dengan nuansa lembut dan elegan.</p>

<h2 style="margin-top: 30px;">Produk Unggulan Pilihan</h2>
<div class="card-grid">
    <?php
    // Menampilkan 3 produk unggulan pertama menggunakan perulangan FOR
    for ($i = 0; $i < 3; $i++) {
        $pObj = new Produk(
            $dataProduk[$i]['kode'],
            $dataProduk[$i]['nama'],
            $dataProduk[$i]['harga'],
            $dataProduk[$i]['stok'],
            $dataProduk[$i]['kategori'],
            $dataProduk[$i]['gambar']
        );
    ?>
    <div class="product-card">
        <img src="assets/images/<?= htmlspecialchars($pObj->gambar); ?>" alt="<?= htmlspecialchars($pObj->nama); ?>" style="width: 100%; height: 450px;" class="product-image">
        <h3><?= htmlspecialchars($pObj->nama); ?></h3>
        <p style="color: #757575; font-size: 13px;"><?= $pObj->kategori; ?></p>
        <div class="price"><?= formatRupiah($pObj->harga); ?></div>
        <p><?= $pObj->cekStatusStok(); ?></p>
        <a href="pages/produk.php" class="btn">Lihat Detail</a>
    </div>
    <?php } ?>
</div>

<?php require_once 'includes/footer.php'; ?>