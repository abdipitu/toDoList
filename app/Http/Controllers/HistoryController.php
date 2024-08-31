<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $archives = Archive::all();
        return view('history', compact('archives'));
    }
}
