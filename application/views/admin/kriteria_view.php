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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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
            <h1 class="mt-4">Books List</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Buku
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Isbn</th>
                                <th>kategori</th>
                                <th>Stok</th>
                                <th>Halaman</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th> <!-- Kolom untuk aksi edit dan delete -->
                            </tr>
                        </thead>
                        <tbody><?php if (!empty($buku) && is_array($buku)): ?>
    <?php foreach ($buku as $index => $buku_item): ?>
        <tr>
            <td><?= $index + 1; ?></td>
            <td>
                <?php if (!empty($buku_item['gambar'])): ?>
                    <img src="<?= base_url('assets/upload/' . $buku_item['gambar']); ?>" alt="<?= $buku_item['judul']; ?>" style="width: 50px; height: auto; margin-right: 10px; float: left;">
                <?php else: ?>
                    <span>Tidak ada gambar</span>
                <?php endif; ?>
                <strong><?= isset($buku_item['judul']) ? $buku_item['judul'] : '-'; ?></strong>
            </td>
            <td><?= isset($buku_item['penulis']) ? $buku_item['penulis'] : '-'; ?></td>
            <td><?= isset($buku_item['penerbit']) ? $buku_item['penerbit'] : '-'; ?></td>
            <td><?= isset($buku_item['tahun_terbit']) ? $buku_item['tahun_terbit'] : '-'; ?></td>
            <td><?= isset($buku_item['isbn']) ? $buku_item['isbn'] : '-'; ?></td>
            <td><?= isset($buku_item['kategori']) ? $buku_item['kategori'] : '-'; ?></td>
            <td><?= isset($buku_item['stok']) ? $buku_item['stok'] : '-'; ?></td>
            <td><?= isset($buku_item['jml_halaman']) ? $buku_item['jml_halaman'] : '-'; ?></td>
            <td><?= isset($buku_item['deskripsi']) ? $buku_item['deskripsi'] : '-'; ?></td>
            <td>
                <!-- Tombol Edit yang memanggil modal -->
                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $buku_item['id_buku']; ?>">
                    <i class="fas fa-pencil-alt"></i> Edit
                </button>
                <a href="<?= base_url('buku/delete/' . $buku_item['id_buku']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                    <i class="fas fa-trash-alt"></i> Delete
                </a>
            </td>
        </tr>

        <!-- Modal Edit Buku -->
        <div class="modal fade" id="editModal<?= $buku_item['id_buku']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Buku: <?= $buku_item['judul']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url('buku/update/' . $buku_item['id_buku']); ?>" method="post">
                    <div class="modal-body">
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul Buku</label>
                                <input type="text" class="form-control" name="judul" value="<?= $buku_item['judul']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="penulis" class="form-label">Penulis</label>
                                <input type="text" class="form-control" name="penulis" value="<?= $buku_item['penulis']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="penerbit" class="form-label">Penerbit</label>
                                <input type="text" class="form-control" name="penerbit" value="<?= $buku_item['penerbit']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                                <input type="date" class="form-control" name="tahun_terbit" value="<?= $buku_item['tahun_terbit']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="isbn" class="form-label">ISBN</label>
                                <input type="text" class="form-control" name="isbn" value="<?= $buku_item['isbn']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" class="form-control" name="kategori" value="<?= $buku_item['kategori']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" class="form-control" name="stok" value="<?= $buku_item['stok']; ?>" required>
                            </div> 
                             <div class="mb-3">
                                <label for="jml_halaman" class="form-label">Halaman</label>
                                <input type="integer" class="form-control" name="jml_halaman" value="<?= $buku_item['jml_halaman']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" required><?= $buku_item['deskripsi']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar Buku</label><br>
                                <img src="<?= base_url('assets/upload/' . $buku_item['gambar']); ?>" style="width: 100px; height: auto;" alt="Gambar Buku"><br><br>
                                <input type="file" class="form-control" name="gambar">
                                <small>Biarkan kosong jika tidak ingin mengubah gambar.</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="6" class="text-center">Tidak ada data buku.</td>
    </tr>
<?php endif; ?>

                    </table>
                </div>
            </div>
        </div>
   
        <div class="container-fluid px-4 mt-5">
    <h1 class="mt-4" style="font-size: 30px;">Data Buku + Penilaian</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Buku + Penilaian
        </div>
        <div class="card-body">
            <!-- Tombol untuk menambah buku baru -->
            <!-- Button untuk memicu modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBukuModal">
                Tambah Data
            </button>

            <!-- Daftar Buku -->
            <table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>C1 (Rating)</th>
            <th>C2 (Jumlah Peminjaman)</th>
            <th>C3 (Tahun Terbit)</th>
            <th>C4 (Jumlah Halaman)</th>
        </tr>
    </thead>
    <tbody>
    <?php if(!empty($penilaian)): ?>
    <?php foreach ($penilaian as $index => $penilaian_item): ?>
        <tr>
            <td><?= $index + 1; ?></td>
            <td><?= $penilaian_item->judul; ?></td>
            <td><?= $penilaian_item->rating; ?> (Bobot: <?= $penilaian_item->bobot_rating; ?>)</td>
            <td><?= $penilaian_item->jumlah_peminjaman; ?> (Bobot: <?= $penilaian_item->bobot_peminjaman; ?>)</td>
            <td><?= $penilaian_item->tahun_terbit; ?> (Bobot: <?= $penilaian_item->bobot_terbit; ?>)</td>
            <td><?= $penilaian_item->jumlah_halaman; ?> (Bobot: <?= $penilaian_item->bobot_halaman; ?>)</td>
        </tr>
                <!-- Modal untuk edit -->
                <div class="modal fade" id="editModal_penilaian<?= $penilaian_item->id_penilaian; ?>" tabindex="-1" aria-labelledby="editModalLabel_<?= $penilaian_item->id_penilaian; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel_<?= $penilaian_item->id_penilaian; ?>">Edit Penilaian Buku</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('kriteria/edit/'.$penilaian_item->id_penilaian); ?>" method="post">
                                    <input type="hidden" name="penilaian[id_penilaian]" value="<?= $penilaian_item->id_penilaian; ?>">

                                    <!-- Input Buku -->
                                    <div class="form-group mb-3">
                                        <label for="id_buku">Judul Buku:</label>
                                        <select name="id_buku" id="id_buku" class="form-control" required>
                                            <option value="">-- Pilih Buku --</option>
                                            <?php foreach ($buku as $b): ?>
                                                <option value="<?= $b['id_buku']; ?>" <?= ($penilaian_item->id_buku == $b['id_buku']) ? 'selected' : ''; ?>>
                                                    <?= $b['judul']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <!-- Input untuk Kriteria Rating -->
                                    <div class="form-group mb-3">
                                        <label for="id_kriteria_rating">Rating:</label>
                                        <select name="id_kriteria_rating" id="id_kriteria_rating" class="form-control" required>
                                            <?php foreach ($kriteria_rating as $rating): ?>
                                                <option value="<?= $rating->id_kriteria; ?>" <?= ($penilaian_item->rating == $rating->id_kriteria) ? 'selected' : ''; ?>>
                                                    <?= $rating->pilihan_kriteria; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <!-- Input untuk Kriteria Peminjaman -->
                                    <div class="form-group mb-3">
                                        <label for="id_kriteria_peminjaman">Jumlah Peminjaman:</label>
                                        <select name="id_kriteria_peminjaman" id="id_kriteria_peminjaman" class="form-control" required>
                                            <?php foreach ($kriteria_peminjaman as $peminjaman): ?>
                                                <option value="<?= $peminjaman->id_kriteria; ?>" <?= ($penilaian_item->jumlah_peminjaman == $peminjaman->id_kriteria) ? 'selected' : ''; ?>>
                                                    <?= $peminjaman->pilihan_kriteria; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <!-- Input untuk Kriteria Terbit -->
                                    <div class="form-group mb-3">
                                        <label for="id_kriteria_terbit">Tahun Terbit:</label>
                                        <select name="id_kriteria_terbit" id="id_kriteria_terbit" class="form-control" required>
                                            <?php foreach ($kriteria_terbit as $terbit): ?>
                                                <option value="<?= $terbit->id_kriteria; ?>" <?= ($penilaian_item->tahun_terbit == $terbit->id_kriteria) ? 'selected' : ''; ?>>
                                                    <?= $terbit->pilihan_kriteria; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <!-- Input untuk Kriteria Halaman -->
                                    <div class="form-group mb-3">
                                        <label for="id_kriteria_halaman">Jumlah Halaman:</label>
                                        <select name="id_kriteria_halaman" id="id_kriteria_halaman" class="form-control" required>
                                            <?php foreach ($kriteria_halaman as $halaman): ?>
                                                <option value="<?= $halaman->id_kriteria; ?>" <?= ($penilaian_item->jumlah_halaman == $halaman->id_kriteria) ? 'selected' : ''; ?>>
                                                    <?= $halaman->pilihan_kriteria; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center">Data penilaian belum tersedia.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<!-- Modal Tambah Data Karyawan -->
<div class="modal fade" id="tambahBukuModal" tabindex="-1" aria-labelledby="tambahBukuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahBukuModalLabel">Tambah Data Buku + Penilaian</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('kriteria/tambah'); ?>" method="post">
          <!-- Input Nama Buku -->
          <div class="form-group mb-3">
            <label for="id_buku">Judul Buku:</label>
            <select name="id_buku" id="id_buku" class="form-control" required>
              <?php foreach ($buku as $b): ?>
                <option value="<?= $b['id_buku']; ?>"><?= $b['judul']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Input untuk Kriteria Rating -->
          <div class="form-group mb-3">
            <label for="id_kriteria_rating">Kriteria Rating:</label>
            <select name="id_kriteria_rating" id="id_kriteria_rating" class="form-control" required>
              <?php foreach ($kriteria_rating as $rating): ?>
                <option value="<?= $rating->id_kriteria; ?>"><?= $rating->pilihan_kriteria; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Input untuk Kriteria Peminjaman -->
          <div class="form-group mb-3">
            <label for="id_kriteria_peminjaman">Kriteria Peminjaman:</label>
            <select name="id_kriteria_peminjaman" id="id_kriteria_peminjaman" class="form-control" required>
              <?php foreach ($kriteria_peminjaman as $peminjaman): ?>
                <option value="<?= $peminjaman->id_kriteria; ?>"><?= $peminjaman->pilihan_kriteria; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Input untuk Kriteria Tahun Terbit -->
          <div class="form-group mb-3">
            <label for="id_kriteria_terbit">Kriteria Tahun Terbit:</label>
            <select name="id_kriteria_terbit" id="id_kriteria_terbit" class="form-control" required>
              <?php foreach ($kriteria_terbit as $terbit): ?>
                <option value="<?= $terbit->id_kriteria; ?>"><?= $terbit->pilihan_kriteria; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Input untuk Kriteria Jumlah Halaman -->
          <div class="form-group mb-3">
            <label for="id_kriteria_halaman">Kriteria Jumlah Halaman:</label>
            <select name="id_kriteria_halaman" id="id_kriteria_halaman" class="form-control" required>
              <?php foreach ($kriteria_halaman as $halaman): ?>
                <option value="<?= $halaman->id_kriteria; ?>"><?= $halaman->pilihan_kriteria; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



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

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('js/scripts.js'); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('js/datatables-simple-demo.js'); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
        <script src="<?= base_url('js/chart-area-demo.js'); ?>"></script>
        <script src="<?= base_url('js/chart-bar-demo.js'); ?>"></script> <!-- Script for Area Chart -->
       
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar', // Jenis grafik (bar chart)
        data: {
            labels: <?php echo json_encode($values); ?>, // Menggunakan data labels dari controller
            datasets: [{
                label: 'Total Peminjaman',
                data: <?php echo json_encode($labels); ?>, // Menggunakan data values dari controller
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true // Mulai sumbu Y dari nol
                }
            }
        }
    });
</script>

    </body>
</html>
