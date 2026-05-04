<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        // Ambil 3 topik terbaru
        $topics = Topic::latest()->take(3)->get();
        return view('welcome', compact('topics'));
    }
}
