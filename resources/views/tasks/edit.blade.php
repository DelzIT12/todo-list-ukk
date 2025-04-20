@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4>Edit Tugas</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Judul Tugas</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
                </div>

                {{-- <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control" rows="3">{{ $task->description }}</textarea>
                </div> --}}

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Belum Selesai</option>
                            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="priority" class="form-label">Prioritas</label>
                        <select name="priority" id="priority" class="form-select" required>
                            <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low</option>
                            <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="due_date" class="form-label">Batas Waktu</label>
                    <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $task->due_date }}">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
