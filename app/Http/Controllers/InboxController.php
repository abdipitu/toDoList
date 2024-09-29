<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function index()
    {
        $messages = \App\Models\Message::all();
        return view('inbox', compact('messages'));
    }
}
