@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg rounded-4">
        <div class="card-header bg-warning text-dark d-flex align-items-center">
            <i class="bi bi-pencil-square me-2 fs-5"></i>
            <h5 class="mb-0">Edit Tugas</h5>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul Tugas</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label fw-semibold">Status</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-hourglass-split"></i></span>
                        <select name="status" id="status" class="form-select" required>
                            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Belum Selesai</option>
                            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="priority" class="form-label fw-semibold">Prioritas</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-exclamation-triangle-fill"></i></span>
                        <select name="priority" id="priority" class="form-select" required>
                            <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Rendah</option>
                            <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Sedang</option>
                            <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>Tinggi</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="due_date" class="form-label fw-semibold">Batas Waktu</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                        <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $task->due_date }}">
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-circle me-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-warning text-dark">
                        <i class="bi bi-check-circle me-1"></i> Update Tugas
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
