<?php

namespace App\Http\Controllers;

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
        return view('today', compact('todo'));
    }

    public function store(Request $request)
    {
        Todo::create([
          'todo' => $request->todo,
          'is_completed' => false,
        ]);

        return redirect()->route('today');
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->update(['is_completed' => $request->has('is_completed')]);

        return redirect()->route('today');
    }

    public function detailproject($id)
    {
        $project = Title::find($id);
        return view('detailproject', compact('project'));
    }
}
