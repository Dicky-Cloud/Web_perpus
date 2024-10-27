<?php
// Load data dari tabel peminjaman dengan JOIN ke tabel buku untuk mendapatkan judul buku
$query = $this->db->select('peminjaman.nama, buku.judul, peminjaman.tgl_pinjam, peminjaman.tgl_dikembalikan')
                  ->from('peminjaman')
                  ->join('buku', 'peminjaman.id_buku = buku.id_buku', 'left') // LEFT JOIN ke tabel buku
                  ->get();

$peminjaman = $query->result_array();

// Set header untuk unduhan CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="peminjaman.csv"');

// Buka output aliran untuk menulis
$output = fopen('php://output', 'w');

// Tulis header kolom
fputcsv($output, ['Nama', 'Judul Buku', 'Tanggal Peminjaman', 'Tanggal Kembali']);

// Tulis data ke CSV
foreach ($peminjaman as $item) {
    fputcsv($output, [
        $item['nama'],        // Nama peminjam
        $item['judul'],       // Judul buku yang didapat dari tabel buku
        $item['tgl_pinjam'],  // Tanggal peminjaman
        $item['tgl_dikembalikan'] // Tanggal pengembalian
    ]);
}

// Tutup aliran output
fclose($output);
exit;
?>
