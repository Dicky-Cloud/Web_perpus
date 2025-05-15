<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pendaftaran Anggota</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .form-container {
      max-width: 600px;
      margin: 0 auto;
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .form-title {
      text-align: center;
      margin-bottom: 25px;
      color: #343a40;
    }
    .btn-submit {
      width: 100%;
      padding: 10px;
      font-weight: 500;
    }
    .dynamic-field {
      display: none;
    }
  </style>
</head>
<body>

<div class="container py-5">
  <div class="form-container">
    <h2 class="form-title">Form Daftar Hadir Pengunjung<br>Dinas Perpustakaan dan Kearsipan<br>Kabupaten Batang</h2>

    <!-- Flash Message -->
    <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
      <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <!-- Form Pendaftaran Anggota -->
    <form action="<?= base_url('anggota/tambah'); ?>" method="post">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
      </div>
      
      <!-- Radio Button for Status -->
      <div class="mb-3">
        <label class="form-label">Status</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="siswa" value="siswa" required onchange="showFields()">
          <label class="form-check-label" for="siswa">
            Siswa
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="umum" value="umum" required onchange="showFields()">
          <label class="form-check-label" for="umum">
            Umum
          </label>
        </div>
      </div>
      
      <!-- Dynamic Fields -->
      <div class="mb-3" id="nis-field" style="display:none;">
        <label for="nis" class="form-label">Nomor Induk Siswa (NIS)</label>
        <input type="text" class="form-control" id="nis" name="nis">
      </div>
      
      <div class="mb-3" id="nik-field" style="display:none;">
        <label for="kk" class="form-label">Nomor Induk Kependudukan (NIK)</label>
        <input type="text" class="form-control" id="kk" name="kk">
      </div>
      
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="nomor_hp" class="form-label">Nomor HP</label>
        <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" required>
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat Lengkap</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary btn-submit mt-3">Daftar</button>
    </form>
  </div>
</div>

<!-- JavaScript untuk menampilkan field dinamis -->
<script>
  function showFields() {
    const siswaRadio = document.getElementById('siswa');
    const umumRadio = document.getElementById('umum');
    const nisField = document.getElementById('nis-field');
    const nikField = document.getElementById('nik-field');
    
    if (siswaRadio.checked) {
      nisField.style.display = 'block';
      nikField.style.display = 'none';
      document.getElementById('nis').setAttribute('required', '');
      document.getElementById('kk').removeAttribute('required');
    } else if (umumRadio.checked) {
      nisField.style.display = 'none';
      nikField.style.display = 'block';
      document.getElementById('nik').setAttribute('required', '');
      document.getElementById('kk').removeAttribute('required');
    }
  }
  
  // Panggil fungsi saat halaman dimuat untuk menangani kasus ketika form di-refresh
  document.addEventListener('DOMContentLoaded', function() {
    showFields();
  });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>