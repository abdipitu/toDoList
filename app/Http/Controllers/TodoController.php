<?php

namespace App\Http\Controllers;

use App\Models\Task as ModelsTask;
use App\Models\Title;
use Carbon\Carbon;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Console\View\Components\Task;

class TodoController extends Controller
{
    public function index()
    {
        $todo = Todo::all();
        // $today = Carbon::today()->format('Y-m-d');
        return view('task', compact('todo'));
    }

    public function store(Request $request)
    {
        Todo::create([
          'todo' => $request->todo,
          'is_completed' => false,
        ]);

        return redirect()->route('tugas');
    }

    public function update(Request $request, $id)
    {
        $task = Todo::findOrFail($id);
        $task->is_completed = $request->has('is_completed'); // Mengubah status checkbox
        $task->save();

        return redirect()->back();
    }

    public function detailproject($id)
    {
        $project = Title::find($id);
        $tasks = ModelsTask::all();
        return view('detailproject', compact('project', 'tasks'));
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with('success', 'Selamat! Kamu berhasil mengerjakan tugas ini');
    }
}
