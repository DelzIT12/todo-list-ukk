<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // Menampilkan semua tugas
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // Menampilkan form tambah tugas
    public function create()
    {
        return view('tasks.create');
    }

    // Menyimpan tugas baru
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required',
        'description' => 'nullable',
        'status' => 'nullable|in:pending,completed', // Bisa nullable atau default
        'priority' => 'nullable|in:low,medium,high', // Bisa nullable atau default
        'due_date' => 'nullable|date',
    ]);

    // Jika status dan priority tidak dikirim, beri nilai default
    $validatedData['status'] = $validatedData['status'] ?? 'pending';
    $validatedData['priority'] = $validatedData['priority'] ?? 'low';

    Task::create($validatedData);
    
    return redirect()->route('tasks.index')->with('success', 'Tugas berhasil ditambahkan!');
}


    // Menampilkan form edit
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Memperbarui tugas
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required|in:pending,completed',
            'priority' => 'required|in:low,medium,high',
            'due_date' => 'nullable|date',
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diperbarui!');
    }

    // Menghapus tugas
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dihapus!');
    }
}
