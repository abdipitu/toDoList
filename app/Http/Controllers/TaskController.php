<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\Todo;
use App\Models\Title;
use App\Models\Archive;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        $titles = Title::all();
        $today = Carbon::today()->format('Y-m-d');
        return view('dashboard', compact('tasks', 'titles', 'today'));
    }

    public function getTasks()
    {
        $tasks = Task::with('title')->get();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'title_id' => 'required',
        ]);

        Task::create([
            'name' => $request->title,
            'title_id' => $request->title_id,
            'is_completed' => false
        ]);
        
        return redirect()->back()->with('success', 'Task created successfully');
    }
    
    public function storeTitle(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'due_date' => 'required|date'
        ]);

        $dueDate = Carbon::parse($request->input('due_date'));
        $day = $dueDate->locale('id')->translatedFormat('l');
        
        Title::create([
            'title' => $request->title,
            'user_id' => $request->auth()->id(),
            'due_date' => $request->input('due_date') ?? now(),
            'day' => $day,
        ]);

        return redirect()->back();
    }

    public function update(Request $request, Task $task)
    {
        $task->update(['is_completed' => $request->has('is_completed')]);

        return redirect()->back();
    }

    public function destroy(Task $task)
    {
        Archive::create([
            'title' => $task->title,
            'due_date' => $task->due_date,
            'deleted_at' => now(),
        ]);

        $task->delete();

        return redirect()->back();
    }

    public function destroye($id)
    {
        $title = Title::find($id);
        $title->delete();
        return redirect()->route('dashboard');
    }

    public function home()
    {
        $tasks = Task::all();
        $data = \App\Models\Todo::take(3)->get();
        $dataProyek = \App\Models\Title::take(5)->get();
        $today = Carbon::today()->format('Y-m-d');
        return view('home', compact('tasks', 'data', 'today', 'dataProyek'));
    }

    public function project()
    {
        $tasks = Task::all();
        $titles = Title::where('user_id', auth()->id())->get();
        $today = Carbon::today()->format('Y-m-d');
        $count = $titles->count();
        return view('project', compact('tasks', 'titles', 'today', 'count'));
    }
}
