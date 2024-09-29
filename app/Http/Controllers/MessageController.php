<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        // Mendapatkan data title yang tanggalnya sama dengan hari ini
        $titles = Title::whereDate('due_date', now()->toDateString())->get();

        foreach ($titles as $title) {
            // Cek jika message untuk title ini belum ada pada hari ini
            $existingMessage = Message::where('title_id', $title->id)->whereDate('created_at', now()->toDateString())->first();
            
            if (!$existingMessage) {
                // Buat message baru jika belum ada
                Message::create([
                    'message' => $title->title,
                    'title_id' => $title->id,
                ]);
            }
        }
        return redirect()->route('inbox');
    }
}
