<?php
// includes/functions.php - Kumpulan fungsi prosedural untuk format dan perhitungan

// Fungsi format mata uang Rupiah
function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

// Fungsi normalisasi string (Teknik manipulasi string P4)
function bersihkanNamaProduk($teks) {
    return ucwords(strtolower(trim($teks)));
}

// Fungsi hitung diskon prosedural (Operator & Kondisi)
function hitungDiskonProsedural($totalBelanja) {
    $diskon = 0;
    if ($totalBelanja >= 300000) {
        $diskon = $totalBelanja * 0.15; // Diskon 15% untuk belanja >= 300rb
    } elseif ($totalBelanja >= 150000) {
        $diskon = $totalBelanja * 0.10; // Diskon 10% untuk belanja >= 150rb
    }
    return $diskon;
}
?>