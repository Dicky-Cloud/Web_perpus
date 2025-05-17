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

    <!-- Form Pendaftaran Anggota -->
    <form action="<?= base_url('anggota/tambah'); ?>" method="post" onsubmit="return showSuccessAlert()">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
      </div>
      
      <!-- Radio Button for Status -->
      <div class="mb-3">
        <label class="form-label">Status</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="siswa" value="siswa" required>
          <label class="form-check-label" for="siswa">Siswa</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="umum" value="umum" required>
          <label class="form-check-label" for="umum">Umum</label>
        </div>
      </div>
      
      <!-- Dynamic Fields -->
      <div class="mb-3 dynamic-field" id="nis-field">
        <label for="nis" class="form-label">Nomor Induk Siswa (NIS)</label>
        <input type="text" class="form-control" id="nis" name="nis">
      </div>
      
      <div class="mb-3 dynamic-field" id="nik-field">
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
<script>
  function toggleFields() {
    const siswaRadio = document.getElementById('siswa');
    const nisField = document.getElementById('nis-field');
    const nikField = document.getElementById('nik-field');
    const nisInput = document.getElementById('nis');
    const kkInput = document.getElementById('kk');

    if (siswaRadio.checked) {
      nisField.style.display = 'block';
      nikField.style.display = 'none';
      nisInput.setAttribute('required', 'required');
      kkInput.removeAttribute('required');
      kkInput.value = '';
    } else {
      nisField.style.display = 'none';
      nikField.style.display = 'block';
      kkInput.setAttribute('required', 'required');
      nisInput.removeAttribute('required');
      nisInput.value = '';
    }
  }

  document.getElementById('siswa').addEventListener('change', toggleFields);
  document.getElementById('umum').addEventListener('change', toggleFields);
  document.addEventListener('DOMContentLoaded', toggleFields);
</script>
<script>
  function showSuccessAlert() {
    alert("Pendaftaran berhasil!");
    return true; // agar form tetap dikirim
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>