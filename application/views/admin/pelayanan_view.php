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
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: 48%;
            padding: 20px;
            box-sizing: border-box;
        }
        .card h3 {
            margin-top: 0;
            font-size: 18px;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f1f1f1;
        }
        .edit-btn {
            background-color: #ffc107;
            border: none;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 3px;
            cursor: pointer;
        }
        .edit-btn i {
            margin-right: 5px;
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
    <div class="container">
        <!-- Kriteria Lingkungan (C3) -->
        <div class="card">
            <h3>Kriteria Rating (C1)</h3>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pilihan</th>
                        <th>Bobot</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kriteria_rating as $index => $kriteria): ?>
                        <tr>
                        <td><?= $index + 1; ?></td>
                        <!-- Mengakses properti objek $kriteria dengan menggunakan -> -->
                        <td><?= $kriteria->pilihan_kriteria; ?></td>
                        <td><?= $kriteria->bobot_kriteria; ?></td>
                        <td><button class="edit-btn" data-kriteria-id="<?= $kriteria->id_kriteria; ?>" data-table="kriteria_rating"><i class="fas fa-edit"></i> Edit</button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Kriteria Tenaga Medis (C2) -->
        <div class="card">
            <h3>Kriteria Jumlah Peminjaman(C2)</h3>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pilihan</th>
                        <th>Bobot</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kriteria_peminjaman as $index => $kriteria): ?>
                        <tr>
                        <td><?= $index + 1; ?></td>
                        <!-- Mengakses properti objek $kriteria dengan menggunakan -> -->
                        <td><?= $kriteria->pilihan_kriteria; ?></td>
                        <td><?= $kriteria->bobot_kriteria; ?></td>
                        <td><button class="edit-btn" data-kriteria-id="<?= $kriteria->id_kriteria; ?>" data-table="kriteria_peminjaman"><i class="fas fa-edit"></i> Edit</button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Kriteria Pelayanan (C3) -->
        <div class="card">
            <h3>Kriteria Tahun Terbit (C3)</h3>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pilihan</th>
                        <th>Bobot</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($kriteria_terbit as $index => $kriteria): ?>
                    <tr>
                        <td><?= $index + 1; ?></td>
                        <!-- Mengakses properti objek $kriteria dengan menggunakan -> -->
                        <td><?= $kriteria->pilihan_kriteria; ?></td>
                        <td><?= $kriteria->bobot_kriteria; ?></td>
                        <td><button class="edit-btn" data-kriteria-id="<?= $kriteria->id_kriteria; ?>" data-table="kriteria_terbit"><i class="fas fa-edit"></i> Edit</button></td>
                        </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>

        <!-- Kriteria Fasilitas (C4) -->
        <div class="card">
            <h3>Kriteria Jumlah Halaman(C4)</h3>
            <table id="kriteria_Halaman">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pilihan</th>
                        <th>Bobot</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kriteria_halaman as $index => $kriteria): ?>
                        <tr>
                        <td><?= $index + 1; ?></td>
                        <!-- Mengakses properti objek $kriteria dengan menggunakan -> -->
                        <td><?= $kriteria->pilihan_kriteria; ?></td>
                        <td><?= $kriteria->bobot_kriteria; ?></td>
                        <td><button class="edit-btn" data-kriteria-id="<?= $kriteria->id_kriteria; ?>" data-table="kriteria_halaman"><i class="fas fa-edit"></i> Edit</button></td>
 </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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
<!-- Modal Edit Kriteria -->
<div class="modal fade" id="editKriteriaModal" tabindex="-1" aria-labelledby="editKriteriaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post" id="editKriteriaForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editKriteriaLabel">Edit Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_pilihan_kriteria">Pilihan Kriteria</label>
                        <input type="text" name="edit_pilihan_kriteria" id="edit_pilihan_kriteria" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_bobot_kriteria">Bobot Kriteria</label>
                        <input type="double" name="edit_bobot_kriteria" id="edit_bobot_kriteria" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
        </div>
        </div>
            </div>
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('js/scripts.js'); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('js/datatables-simple-demo.js'); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
        <script src="<?= base_url('js/chart-area-demo.js'); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
// Attach the criteria data to the modal before it opens
document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', function() {
        const kriteriaId = this.getAttribute('data-kriteria-id'); // Get the criteria ID
        const table = this.getAttribute('data-table'); // Get the table name

        // Set the form action dynamically to include the correct table and criteria ID
        const form = document.getElementById('editKriteriaForm');
        form.action = `<?= base_url('penilaian/edit_kriteria/'); ?>${table}/${kriteriaId}`;

        // Retrieve existing values
        const row = this.closest('tr'); // Find the closest table row
        const pilihanKriteria = row.querySelector('td:nth-child(2)').innerText; // Get the criteria choice
        const bobotKriteria = row.querySelector('td:nth-child(3)').innerText; // Get the criteria weight

        // Populate the modal inputs with existing data
        document.getElementById('edit_pilihan_kriteria').value = pilihanKriteria;
        document.getElementById('edit_bobot_kriteria').value = bobotKriteria;

        // Hide the footer
        document.querySelector('footer').style.display = 'none';

        // Show the modal
        const modal = new bootstrap.Modal(document.getElementById('editKriteriaModal'));
        modal.show();
    });
});

// Restore footer visibility when the modal is hidden
const editKriteriaModal = document.getElementById('editKriteriaModal');
editKriteriaModal.addEventListener('hidden.bs.modal', function () {
    document.querySelector('footer').style.display = 'block'; // Show the footer again
});
</script>




    </body>
</html>
