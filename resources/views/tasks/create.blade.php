@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg rounded-4">
        <div class="card-header bg-primary text-white d-flex align-items-center">
            <i class="bi bi-pencil-square me-2 fs-5"></i>
            <h5 class="mb-0">Tambah Tugas Baru</h5>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Tugas</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                        <input type="text" name="title" class="form-control" required placeholder="Masukkan judul tugas">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-hourglass-split"></i></span>
                        <select name="status" class="form-select">
                            <option value="pending">Belum Selesai</option>
                            <option value="completed">Selesai</option>
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
                        <input type="date" name="due_date" class="form-control" required placeholder="Masukkan Tanggal">
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
@endsection
