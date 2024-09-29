<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    public function index(Title $title)
    {
        $title->delete();
        return redirect()->route('project');
    }
}