<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
      <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">Dashboard Mahasiswa</a>
    </div>
  </nav>

  <div class="container">
    <div class="card shadow-sm">
      <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Edit Data Mahasiswa</h4>
      </div>

      <div class="card-body">
        <form action="{{ route('students.update', $student->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" id="nim" class="form-control" value="{{ $student->nim }}" required>
          </div>

          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}" required>
          </div>

          <div class="mb-3">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <select name="gender" id="gender" class="form-select" required>
              <option value="">-- Pilih Jenis Kelamin --</option>
              <option value="L" {{ $student->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
              <option value="P" {{ $student->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="domisili" class="form-label">Domisili</label>
            <input type="text" name="domisili" id="domisili" class="form-control" value="{{ $student->domisili }}"
              required>
          </div>

          <div class="mb-3">
            <label for="angkatan" class="form-label">Angkatan</label>
            <input type="number" name="angkatan" id="angkatan" class="form-control" value="{{ $student->angkatan }}"
              required>
          </div>

          <div class="mb-3">
            <label for="prodi" class="form-label">Program Studi</label>
            <input type="text" name="prodi" id="prodi" class="form-control" value="{{ $student->prodi }}" required>
          </div>

          <div class="mb-3">
            <label for="fakultas" class="form-label">Fakultas</label>
            <input type="text" name="fakultas" id="fakultas" class="form-control" value="{{ $student->fakultas }}"
              required>
          </div>

          <div class="d-flex justify-content-between">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>