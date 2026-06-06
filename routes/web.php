<?php

use App\Http\Controllers\AdminTopicController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Topic;
use App\Models\Article;
use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    $topics = Topic::orderBy('discussion_date', 'desc')->get();
    
    $articles = Article::where('status', 'published')->latest()->paginate(9);
    
    return view('welcome', compact('topics', 'articles'));
});

Route::get('/news/{slug}', function ($slug) {
    $article = Article::where('slug', $slug)->where('status', 'published')->firstOrFail();
    return view('article-detail', compact('article'));
})->name('news.detail');

// Rute (Symlink)
Route::get('/buat-jembatan', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    return 'Jembatan gambar berhasil dibuat!';
});

// =========================================================
// Rute Rahasia Pembersih Cache
// =========================================================
Route::get('/bersih-cache', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    return 'Cache server berhasil dibersihkan total!';
});

Route::post('articles/{article}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('admin/topics', AdminTopicController::class);
    
    // Rute Artikel
    Route::patch('articles/{article}/approve', [AdminArticleController::class, 'approve'])->name('articles.approve');
    Route::resource('articles', AdminArticleController::class);
});

require __DIR__.'/auth.php';