<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminTopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!$request->user()->hasRole('Super Admin')) {
        abort(403, 'Akses Ditolak! Hanya Super Admin yang boleh mengatur jadwal.');
    }
        $topics = Topic::orderBy('created_at', 'desc')->get();
        return view('admin.topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.topics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'nullable|string|max:255',
        ]);
        $status = ($request->date < date('Y-m-d')) ? 'completed' : 'upcoming';

        Topic::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'discussion_date' => $request->date,
            'location' => $request->location,
            'status' => $status,
        ]);
        return redirect()->route('topics.index')->with('success', 'Jadwal Diskusi baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topic = Topic::findOrFail($id);
        return view('admin.topics.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'nullable|string|max:255',
        ]);

        $status = ($request->date < date('Y-m-d')) ? 'completed' : 'upcoming';

        $topic = Topic::findOrFail($id);
        $topic->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'discussion_date' => $request->date,
            'location' => $request->location,
            'status' => $status,
        ]);
        return redirect()->route('topics.index')->with('success', 'Jadwal Diskusi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();
        return redirect()->route('topics.index')->with('success', 'Jadwal Diskusi berhasil dihapus!');
    }
}
