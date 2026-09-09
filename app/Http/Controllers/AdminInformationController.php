<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Information;
use Illuminate\Http\Request;

class AdminInformationController extends Controller
{
    public function index()
    {
        $informations = Information::with('category')->latest()->get();
        
        // Fitur Bonus: Statistik Dashboard Ringkas
        $totalInformasi = $informations->count();
        $totalPublished = $informations->where('status', 'published')->count();
        $totalDraft = $informations->where('status', 'draft')->count();

        return view('admin.index', compact('informations', 'totalInformasi', 'totalPublished', 'totalDraft'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.create', compact('categories'));
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

        return redirect()->route('admin.information.index')
            ->with('success', 'Informasi berhasil ditambahkan!');
    }

    public function show($id)
    {
        $information = Information::with('category')->findOrFail($id);
        return view('admin.show', compact('information'));
    }

    public function edit($id)
    {
        $information = Information::findOrFail($id);
        $categories = Category::all();
        return view('admin.edit', compact('information', 'categories'));
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

        return redirect()->route('admin.information.index')
            ->with('success', 'Informasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $information = Information::findOrFail($id);
        $information->delete();

        return redirect()->route('admin.information.index')
            ->with('success', 'Informasi berhasil dihapus!');
    }
}