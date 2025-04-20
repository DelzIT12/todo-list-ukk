@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Tugas Baru</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Judul Tugas</label>
                    <input type="text" name="title" class="form-control" required placeholder="Masukkan judul tugas">
                </div>

                {{-- <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Tambahkan deskripsi"></textarea>
                </div> --}}

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="pending">Belum Selesai</option>
                            <option value="completed">Selesai</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Prioritas</label>
                        <select name="priority" class="form-select">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Batas Waktu</label>
                    <input type="date" name="due_date" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Batal
                    </a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
