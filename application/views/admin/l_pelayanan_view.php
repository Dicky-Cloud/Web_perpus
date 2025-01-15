<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Dashboard admin perpustakaan" />
        <meta name="author" content="Admin Perpustakaan" />
        <title>Dashboard - Admin Perpustakaan</title>
        <!-- CDN for Datatables and Font Awesome -->
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="<?= base_url('css/styles.css'); ?>" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     
<script>
    function printTable() {
        // Simpan konten halaman yang ada
        var originalContents = document.body.innerHTML;

        // Ambil teks header dan tabel yang ingin dicetak
        var headerPrint = document.getElementById('header-print').outerHTML; // Ambil teks Data Peminjaman
        var tablePrint = document.getElementById('table-print').outerHTML;  // Ambil tabel

        // Ganti seluruh isi body dengan teks header dan tabel yang akan dicetak
        document.body.innerHTML = headerPrint + tablePrint;

        // Lakukan perintah cetak
        window.print();

        // Kembalikan konten asli setelah mencetak
        document.body.innerHTML = originalContents;
    }
</script>

     <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 400px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #f1f1f1;
            padding: 10px 15px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h2 {
            margin: 0;
            font-size: 16px;
            color: #007bff;
        }
        .header .toggle-icon {
            font-size: 14px;
            color: #007bff;
        }
        .content {
            padding: 15px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #333;
        }
        .form-group input {
            width: calc(100% - 40px);
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group .input-group {
            display: flex;
            align-items: center;
        }
        .form-group .input-group i {
            padding: 8px;
            background-color: #f1f1f1;
            border: 1px solid #ddd;
            border-left: none;
            border-radius: 0 4px 4px 0;
            color: #333;
        }
        .form-group .input-group input {
            border-radius: 4px 0 0 4px;
            border-right: none;
        }
        .form-group .submit-btn {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group .submit-btn:hover {
            background-color: #0056b3;
        } .table {
        margin-top: 20px; /* Memberi spasi di atas tabel */
    }
    .table th, .table td {
        border-bottom: 1px solid #ddd; /* Garis pemisah di antara baris tabel */
        padding: 8px; /* Memberi sedikit padding */
    }
    </style>
    </head>
    <body class="sb-nav-fixed">
        <!-- Top Navigation Bar -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand ps-3" href="<?= base_url('dashboard'); ?>">Admin Perpustakaan</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Sidebar -->
   
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?= base_url('home'); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="<?= base_url('Rekomendasi'); ?>">
                                <div class="sb-nav-link-icon"><i class="fa-brands fa-gratipay"></i></div>
                                Rekomendasi
                            </a>

                            <div class="sb-sidenav-menu-heading">Master Data</div>
                            <!-- Data Anggota Section -->
                            <a class="nav-link" href="<?= base_url('anggota'); ?>">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                Data Anggota
                            </a>
                            <!-- Data Buku Section -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBuku" aria-expanded="false" aria-controls="collapseBuku">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                                Data Buku
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseBuku" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url('buku'); ?>">Buku</a>
                                    <a class="nav-link" href="<?= base_url('buku/tambah'); ?>">Tambah Buku</a>
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">Data Transaksi</div>
                            <!-- Data Anggota Section -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsetransaksi" aria-expanded="false" aria-controls="collapsetransaksi">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book-open"></i></div>
                                Data Transaksi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsetransaksi" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url('Laporan_p'); ?>">Laporan</a>
                                    <a class="nav-link" href="<?= base_url('peminjaman'); ?>">Data Peminjaman</a>
                                       </nav>
                            </div>
                            <!-- Laporan Section -->
                        
                            <!-- Data Anggota Section -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsemetode" aria-expanded="false" aria-controls="collapsetransaksi">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book-open"></i></div>
                                Metode SPK SAW
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsemetode" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url('penilaian'); ?>">Data Kriteria</a>
                                <a class="nav-link" href="<?= base_url('kriteria'); ?>">Data Alternatif</a>
                                 <a class="nav-link" href="<?= base_url('hasil'); ?>">Nilai /proses spk</a>
                                       </nav>
                            </div>

                            <!-- Pages Section -->
                           
                              <!-- Backup Data Section -->
                            <a class="nav-link" href="<?= base_url('backup'); ?>">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-database"></i></div>
                                Backup Data
                            </a>

                        </div>
                    </div>
                </nav>
            </div>

            <!-- Content -->
            <div id="layoutSidenav_content">
            <main>
    <div class="container"><br>
        <h2 style="font-size: 25px;" id="header-print">Data Peminjaman</h2> <!-- Teks yang akan dicetak -->

        <!-- Form untuk filter data berdasarkan tanggal -->
        <form method="post" action="<?= base_url('Laporan_p'); ?>">
            <div class="form-group">
                <label for="dari">Dari</label>
                <input type="date" id="dari" name="dari" value="<?= $this->session->userdata('filter_dari'); ?>" required>
            </div>
            <div class="form-group">
                <label for="sampai">Sampai</label>
                <input type="date" id="sampai" name="sampai" value="<?= $this->session->userdata('filter_sampai'); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="<?= base_url('Laporan_p/reset_filter'); ?>" class="btn btn-secondary">Reset</a>
        </form><br>
        </div>
<br>
        <!-- Tabel hanya ditampilkan jika ada hasil dari filter -->
        <?php if (!empty($peminjaman)): ?>
            <button class="btn btn-primary" onclick="printTable()">Print</button>&nbsp;
            <a href="<?= base_url('csv'); ?>" class="btn btn-success">Unduh CSV</a>
            <br><br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Judul</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Kembali</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($peminjaman as $index => $item): ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= $item['nama']; ?></td>
                            <td><?= $item['judul']; ?></td>
                            <td><?= $item['tgl_pinjam']; ?></td>
                            <td><?= $item['tgl_dikembalikan']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center">Silakan gunakan filter untuk menampilkan data peminjaman.</p>
        <?php endif; ?>
</main>


                <!-- Footer -->
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy;  Dicky Arfiansyah 2025</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
</div>

<?php
// Cek apakah pengguna mengklik tombol untuk mengunduh CSV
if (isset($_GET['download_csv'])) {
    // Set header untuk unduhan CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="peminjaman.csv"');

    // Buka output aliran untuk menulis
    $output = fopen('php://output', 'w');

    // Tulis header kolom
    fputcsv($output, ['Nama', 'Judul', 'Tanggal Peminjaman', 'Tanggal Kembali']);

    // Tulis data ke CSV
    foreach ($peminjaman as $item) {
        fputcsv($output, [
            $item['nama'],
            $item['judul'],
            $item['tgl_pinjam'],
            $item['tgl_dikembalikan']
        ]);
    }

    // Tutup aliran output
    fclose($output);
    exit;
}
?>
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('js/scripts.js'); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('js/datatables-simple-demo.js'); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
        <script src="<?= base_url('js/chart-area-demo.js'); ?>"></script>
        <script src="<?= base_url('js/chart-bar-demo.js'); ?>"></script><script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

    </body>
</html>
