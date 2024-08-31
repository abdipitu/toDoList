<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('dashboard', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Task::create($request->only('title'));

        return redirect()->route('dashboard');
    }

    public function update(Request $request, Task $task)
    {
        $task->update(['is_completed' => $request->has('is_completed')]);

        return redirect()->route('dashboard');
    }

    public function destroy(Task $task)
    {
        Archive::create([
            'title' => $task->title,
            'due_date' => $task->due_date,
            'deleted_at' => now(),
        ]);

        $task->delete();

        return redirect()->route('dashboard');
    }
}
