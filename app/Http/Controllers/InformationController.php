<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index(Request $request)
    {
        $query = Information::with('category');

        // Fitur Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('ringkasan', 'like', "%{$search}%");
            });
        }

        // Fitur Pagination (5 data per halaman)
        $informations = $query->latest()->paginate(5);

        // Ringkasan Statistik Dashboard
        $totalInformasi = Information::count();
        $totalPublished = Information::where('status', 'published')->count();
        $totalDraft = Information::where('status', 'draft')->count();

        return view('information.index', compact('informations', 'totalInformasi', 'totalPublished', 'totalDraft'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('information.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:categories,id',
            'judul'       => 'required|string|max:255',
            'ringkasan'   => 'required|string',
            'isi'         => 'required|string',
            'sumber'      => 'nullable|url',
            'status'      => 'required|in:draft,published',
        ]);

        Information::create($validated);

        return redirect()->route('information.index')->with('success', 'Data berhasil disimpan!');
    }

    public function show($id)
    {
        $information = Information::with('category')->findOrFail($id);
        return view('information.show', compact('information'));
    }

    public function edit($id)
    {
        $information = Information::findOrFail($id);
        $categories = Category::all();
        return view('information.edit', compact('information', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:categories,id',
            'judul'       => 'required|string|max:255',
            'ringkasan'   => 'required|string',
            'isi'         => 'required|string',
            'sumber'      => 'nullable|url',
            'status'      => 'required|in:draft,published',
        ]);

        $information = Information::findOrFail($id);
        $information->update($validated);

        return redirect()->route('information.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $information = Information::findOrFail($id);
        $information->delete();

        return redirect()->route('information.index')->with('success', 'Data berhasil dihapus!');
    }
}