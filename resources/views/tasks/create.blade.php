@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg rounded-4">
        <div class="card-header bg-primary text-white d-flex align-items-center">
            <i class="bi bi-pencil-square me-2 fs-5"></i>
            <h5 class="mb-0">Tambah Tugas Baru</h5>
        </div>

        <div class="card-body p-4">
            <form id="taskForm" action="{{ route('tasks.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Tugas</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                        <input type="text" name="title" class="form-control" placeholder="Masukkan judul tugas">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-hourglass-split"></i></span>
                        <select name="status" class="form-select">
                            <option value="pending">Belum Selesai</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Prioritas</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-exclamation-triangle-fill"></i></span>
                        <select name="priority" class="form-select">
                            <option value="low">Rendah</option>
                            <option value="medium">Sedang</option>
                            <option value="high">Tinggi</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Batas Waktu</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                        <input type="text" id="due_date" name="due_date" class="form-control" placeholder="Pilih Tanggal">
                    </div>
                </div>
                

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left-circle me-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle-fill me-1"></i> Simpan Tugas
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('taskForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Mencegah form langsung submit

        const title = document.querySelector('input[name="title"]').value.trim();
        const dueDate = document.querySelector('input[name="due_date"]').value.trim();

        // Kata-kata/kode berbahaya
        const forbiddenWords = ['<script>', 'DROP TABLE', 'SELECT * FROM', '--', 'INSERT INTO', 'DELETE FROM'];

        // Cek apakah judul mengandung kata berbahaya
        const isDangerous = forbiddenWords.some(word =>
            title.toLowerCase().includes(word.toLowerCase())
        );

        if (title === '' || dueDate === '') {
            Swal.fire({
                icon: 'warning',
                title: 'Data harus diisi!',
                text: 'Judul dan Tanggal tidak boleh kosong.',
            });
            return;
        }

        if (isDangerous) {
            Swal.fire({
                icon: 'error',
                title: 'Input Tidak Diperbolehkan!',
                text: 'Judul mengandung karakter atau kata yang tidak aman.',
            });
            return;
        }

        Swal.fire({
            title: 'Konfirmasi',
            text: "Apakah data sudah sesuai?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Simpan',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.submit();
            }
        });
    });
</script>


<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>

<script>
    flatpickr("#due_date", {
        dateFormat: "Y/m/d",        // Format: Tahun/Bulan/Tanggal untuk disimpan
        altInput: true,             // Menampilkan versi tampilan user
        altFormat: "d F Y",         // Contoh: 25 April 2025
        locale: "id",               // Bahasa Indonesia
    });
</script>


@endsection
