<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;

class AdminArticleController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        //Super Admin melihat semua, Author hanya melihat karyanya sendiri
        if ($user->hasRole('Super Admin')) {
            $articles = Article::latest()->get();
        } else {
            $articles = Article::where('user_id', $user->id)->latest()->get();
        }

        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'content' => 'required',
        ]);

        $imagePath = null;
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('article-covers'), $filename);
            $imagePath = 'article-covers/' . $filename;
        }

        $user = $request->user();
        $status = $user->hasRole('Super Admin') ? 'published' : 'pending';

        Article::create([
            'user_id' => $user->id,
            'author_name' => $request->author_name,
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . Str::random(6),
            'cover_image' => $imagePath,
            'image_source' => $request->image_source,
            'content' => $request->content,
            'status' => $status,
        ]);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil disimpan!');
    }

    public function edit(Article $article, Request $request)
    {
        if (!$request->user()->hasRole('Super Admin') && $article->user_id !== $request->user()->id) {
            abort(403, 'Boss bilang: Anda tidak punya akses ke artikel ini!');
        }

        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        if (!$request->user()->hasRole('Super Admin') && $article->user_id !== $request->user()->id) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'content' => 'required',
        ]);

        $imagePath = $article->cover_image;
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('article-covers'), $filename);
            $imagePath = 'article-covers/' . $filename;
        }

        $article->update([
            'author_name' => $request->author_name,
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . Str::random(6),
            'cover_image' => $imagePath,
            'image_source' => $request->image_source,
            'content' => $request->content,
        ]);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Article $article, Request $request)
    {
        if (!$request->user()->hasRole('Super Admin') && $article->user_id !== $request->user()->id) {
            abort(403);
        }

        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus!');
    }

    public function approve(Article $article, Request $request)
    {
        if (!$request->user()->hasRole('Super Admin')) {
            abort(403, 'Hanya Super Admin yang bisa menyetujui artikel!');
        }

        $article->update(['status' => 'published']);

        return redirect()->route('articles.index')->with('success', 'Artikel resmi disetujui dan tayang publik!');
    }
}