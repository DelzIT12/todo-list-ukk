@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">📋 To-Do List</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Tugas
        </a>
    </div>

    @if($tasks->isEmpty())
        <div class="alert alert-info text-center">
            Belum ada data tugas.
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($tasks as $task)
                <div class="col">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $task->title }}
                            </h5>
                            <p class="card-text">
                                <span class="badge 
                                    {{ $task->status === 'completed' ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ $task->status === 'completed' ? 'Selesai' : 'Belum Selesai' }}
                                </span>
                                <span class="badge bg-info text-dark">{{ ucfirst($task->priority) }}</span>
                            </p>
                            <p class="text-muted mb-2">
                                <i class="bi bi-calendar-event"></i>
                                {{ $task->due_date ?? '-' }}
                            </p>

                            <div class="d-flex gap-2">
                                <!-- Edit -->
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <!-- Selesai -->
                                @if($task->status !== 'completed')
                                    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="title" value="{{ $task->title }}">
                                        <input type="hidden" name="description" value="{{ $task->description }}">
                                        <input type="hidden" name="priority" value="{{ $task->priority }}">
                                        <input type="hidden" name="due_date" value="{{ $task->due_date }}">
                                        <input type="hidden" name="status" value="completed">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="bi bi-check-circle"></i>
                                        </button>
                                    </form>
                                @endif

                                <!-- Hapus -->
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger btn-delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@if(session('success'))
<script>
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 1500,
        width: '300px',
        customClass: {
            popup: 'small-alert'
        }
    });
</script>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.btn-delete');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const form = this.closest('form');

                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire({
                            title: "Terhapus!",
                            text: "Data berhasil dihapus.",
                            icon: "success"
                        });
                    }
                });
            });
        });
    });
</script>

<style>
    .swal2-popup.small-alert {
        font-size: 0.85rem !important;
    }
</style>
@endsection
