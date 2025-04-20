@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">To-Do List</h2>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Tambah Tugas</a>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Prioritas</th>
                <th>Jatuh Tempo</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $key => $task)
            <tr>
                <td>{{ $key+1 }}</td>
                <td><div style="max-width: 200px; white-space: normal; word-break: break-word;">{{ $task->title }}</div></td>
                <td>
                    @if($task->status === 'completed')
                        <span class="badge bg-success">Selesai</span>
                    @else
                        <span class="badge bg-warning">Belum Selesai</span>
                    @endif
                </td>
                <td>{{ ucfirst($task->priority) }}</td>
                <td>{{ $task->due_date ?? '-' }}</td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <!-- Tombol Selesai jika belum selesai -->
                    @if($task->status !== 'completed')
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="title" value="{{ $task->title }}">
                        <input type="hidden" name="description" value="{{ $task->description }}">
                        <input type="hidden" name="priority" value="{{ $task->priority }}">
                        <input type="hidden" name="due_date" value="{{ $task->due_date }}">
                        <input type="hidden" name="status" value="completed">
                        <button type="submit" class="btn btn-success btn-sm">Selesai</button>
                    </form>
                    @endif

                    <!-- Tombol Hapus -->
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm btn-delete">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada data tugas.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
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
