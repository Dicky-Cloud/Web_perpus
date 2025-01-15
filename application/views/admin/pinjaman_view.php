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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="<?= base_url('css/styles.css'); ?>" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script><!-- Tambahkan CSS Select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Tambahkan JavaScript Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

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
    <div class="container-fluid px-4">
        <h1 class="mt-4" style="font-size: 30px;">Daftar Peminjaman</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Anggota
            </div>
            <div class="card-body">
                <!-- Notifikasi -->
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <!-- Tombol Tambah Data -->
                <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#tambahPeminjamanModal">Tambah Peminjaman</button>

                <!-- Tabel Data Peminjaman -->
               <!-- Tabel Data Peminjaman -->
<table id="datatablesSimple" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th> <!-- Tambahkan kolom ID Buku -->
            <th>Judul</th>
            <th>Nama</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Denda</th>
            <th>Total Pinjaman</th>
            <th>Tanggal Dikembalikan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($peminjaman) && is_array($peminjaman)): ?>
    <?php foreach ($peminjaman as $index => $peminjaman_item): ?>
        <tr>
            <td><?= $index + 1; ?></td>
            <td><?= isset($peminjaman_item['judul']) ? $peminjaman_item['judul'] : '-'; ?></td> <!-- Menampilkan Nama Buku -->
            <td><?= isset($peminjaman_item['nama']) ? $peminjaman_item['nama'] : '-'; ?></td>
            <td><?= isset($peminjaman_item['tgl_pinjam']) ? date('d-m-Y', strtotime($peminjaman_item['tgl_pinjam'])) : '-'; ?></td>
            <td><?= isset($peminjaman_item['tgl_kembali']) ? date('d-m-Y', strtotime($peminjaman_item['tgl_kembali'])) : '-'; ?></td>
            <td><?= isset($peminjaman_item['status']) ? $peminjaman_item['status'] : '-'; ?></td> 
           <td><?= isset($peminjaman_item['denda']) ? $peminjaman_item['denda'] : '-'; ?></td>
            <td><?= isset($peminjaman_item['total_pinjaman']) ? $peminjaman_item['total_pinjaman'] : '-'; ?></td>
            <td><?= isset($peminjaman_item['tgl_dikembalikan']) ? date('d-m-Y', strtotime($peminjaman_item['tgl_dikembalikan'])) : '-'; ?></td>
            <td>
                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $peminjaman_item['id_peminjaman']; ?>">Edit</button>
                <a href="<?= base_url('peminjaman/hapus/' . $peminjaman_item['id_peminjaman']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="10" class="text-center">Tidak ada data peminjaman.</td>
    </tr>
<?php endif; ?>

    </tbody>
</table>

            </div>
        </div>
    </div>
</main><!-- Modal Edit untuk Setiap Anggota --><!-- Modal Tambah Peminjaman -->
<!-- Modal Tambah Peminjaman -->
<div class="modal fade" id="tambahPeminjamanModal" tabindex="-1" aria-labelledby="tambahPeminjamanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPeminjamanLabel">Tambah Peminjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('peminjaman/tambah'); ?>" method="post">
                <div class="modal-body">
                    <!-- Notifikasi untuk pesan sukses atau error -->
                    <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="mb-3">
                <label for="id_buku" class="form-label">Buku</label>
                <select class="form-control select2" id="id_buku" name="id_buku" data-placeholder="Cari atau masukkan buku..." required>
                    <option value="">Cari atau masukan buku</option> <!-- Placeholder untuk memulai dengan kosong -->
                    <?php foreach ($buku as $buku_item): ?>
                        <option value="<?= $buku_item['id_buku']; ?>">
                            <?= $buku_item['judul']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

                                <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                        <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" required>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                        <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" required>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_hp" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" required>
                    </div>
                    <div class="mb-3">
                        <label for="denda" class="form-label">Denda(opsional)</label>
                        <input type="denda" class="form-control" id="denda" name="denda" required>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_dikembalikan" class="form-label">Tanggal Dikembalikan</label>
                        <input type="date" class="form-control" id="tgl_dikembalikan" name="tgl_dikembalikan" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Dipinjam">Dipinjam</option>
                            <option value="Dikembalikan">Dikembalikan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="total_pinjaman" class="form-label">Jumlah Pinjaman</label>
                        <input type="number" class="form-control" id="total_pinjaman" name="total_pinjaman" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah Peminjaman</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit Peminjaman -->
<?php foreach ($peminjaman as $peminjaman_item): ?>
<div class="modal fade" id="editModal<?= $peminjaman_item['id_peminjaman']; ?>" tabindex="-1" aria-labelledby="editPeminjamanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPeminjamanLabel">Edit Peminjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('peminjaman/update/' . $peminjaman_item['id_peminjaman']); ?>" method="post">
                <div class="modal-body">
                    <!-- Notifikasi untuk pesan sukses atau error -->
                    <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Edit Judul Buku -->
                    <div class="mb-3">
                        <label for="edit_id_buku" class="form-label">Buku</label>
                        <select class="form-control select2" id="edit_id_buku" name="id_buku" required>
                            <?php foreach ($buku as $buku_item): ?>
                                <option value="<?= $buku_item['id_buku']; ?>" <?= $buku_item['id_buku'] == $peminjaman_item['id_buku'] ? 'selected' : ''; ?>>
                                    <?= $buku_item['judul']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Edit Nama Peminjam -->
                    <div class="mb-3">
                        <label for="edit_nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="edit_nama" name="nama" value="<?= $peminjaman_item['nama']; ?>" required>
                    </div>

                    <!-- Edit Tanggal Pinjam -->
                    <div class="mb-3">
                        <label for="edit_tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                        <input type="date" class="form-control" id="edit_tgl_pinjam" name="tgl_pinjam" value="<?= $peminjaman_item['tgl_pinjam']; ?>" required>
                    </div>

                    <!-- Edit Tanggal Kembali -->
                    <div class="mb-3">
                        <label for="edit_tgl_kembali" class="form-label">Tanggal Kembali</label>
                        <input type="date" class="form-control" id="edit_tgl_kembali" name="tgl_kembali" value="<?= $peminjaman_item['tgl_kembali']; ?>" required>
                    </div>

                    <!-- Edit Status Peminjaman -->
                    <div class="mb-3">
                        <label for="edit_status" class="form-label">Status</label>
                        <select class="form-control" id="edit_status" name="status" required>
                            <option value="Dipinjam" <?= $peminjaman_item['status'] == 'Dipinjam' ? 'selected' : ''; ?>>Dipinjam</option>
                            <option value="Dikembalikan" <?= $peminjaman_item['status'] == 'Dikembalikan' ? 'selected' : ''; ?>>Dikembalikan</option>
                        </select>
                    </div>

                    <!-- Edit Denda -->
                    <div class="mb-3">
                        <label for="edit_denda" class="form-label">Denda</label>
                        <input type="text" class="form-control" id="edit_denda" name="denda" value="<?= $peminjaman_item['denda']; ?>" required>
                    </div>

                    <!-- Edit Tanggal Dikembalikan -->
                    <div class="mb-3">
                        <label for="edit_tgl_dikembalikan" class="form-label">Tanggal Dikembalikan</label>
                        <input type="date" class="form-control" id="edit_tgl_dikembalikan" name="tgl_dikembalikan" value="<?= $peminjaman_item['tgl_dikembalikan']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

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
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('js/scripts.js'); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('js/datatables-simple-demo.js'); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
        <script src="<?= base_url('js/chart-area-demo.js'); ?>"></script>
        <script src="<?= base_url('js/chart-bar-demo.js'); ?>"></script>
        <script>
    <script>
    $(document).ready(function() {
        $('.select2').select2({
            minimumResultsForSearch: Infinity, // Sembunyikan kotak pencarian
            width: '100%', // Pastikan dropdown menggunakan lebar penuh
        });
    });

</script>
</script>

    </body>
    
</html>
