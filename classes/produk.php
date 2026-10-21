<?php
// classes/Produk.php - Class Object Oriented Programming untuk entitas Produk
class Produk {
    // Properti produk
    public string $kode;
    public string $nama;
    public float $harga;
    public int $stok;
    public string $kategori;
    public string $gambar;

    // Konstruktor untuk menginisialisasi properti produk
    public function __construct(string $kode, string $nama, float $harga, int $stok, string $kategori, string $gambar = null) {
        $this->kode = $kode;
        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
        $this->kategori = $kategori;
        $this->gambar = $gambar ?? 'default.jpg';
    }

    // Metode untuk mendapatkan informasi produk dalam format string
    public function getInfoProduk() {
        return "<b>" . htmlspecialchars($this->nama) . "</b> (" . $this->kategori . ") - Rp " . number_format($this->harga, 0, ',', '.');
    }

    // Metode untuk mengecek status stok produk
    public function cekStatusStok() {
        if ($this->stok > 10) {
            return '<span style="color: green;">Stok Aman (' . $this->stok . ')</span>';
        } elseif ($this->stok > 0) {
            return '<span style="color: orange;">Stok Terbatas (' . $this->stok . ')</span>';
        } else {
            return '<span style="color: red;">Habis</span>';
        }
    }
}
?>