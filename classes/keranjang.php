<?php
// classes/Keranjang.php - Class OOP untuk mengelola item keranjang belanja
class Keranjang {
    public $items = [];

    // Metode untuk menambahkan item ke keranjang
    public function tambahItem($nama, $harga, $qty) {
        $this->items[] = [
            'nama' => $nama,
            'harga' => $harga,
            'qty' => $qty,
            'subtotal' => $harga * $qty
        ];
    }

    // Metode untuk menghapus item dari keranjang berdasarkan indeks
    public function getDaftarItem() {
        return $this->items;
    }

    // Metode untuk menghitung total harga semua item dalam keranjang
    public function hitungTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['subtotal'];
        }
        return $total;
    }
}
?>