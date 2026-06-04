<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'body' => 'required|string|max:1000',
        ]);

        $article->comments()->create([
            'name' => $request->name,
            'body' => $request->body,
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}