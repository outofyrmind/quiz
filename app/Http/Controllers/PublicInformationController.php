<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class PublicInformationController extends Controller
{
    public function index(Request $request)
    {
        $query = Information::with('category')->where('status', 'published');

        // Fitur Bonus: Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('ringkasan', 'like', "%{$search}%");
            });
        }

        // Fitur Bonus: Pagination
        $informations = $query->latest()->paginate(6);

        return view('public.index', compact('informations'));
    }

    public function show($id)
    {
        $information = Information::with('category')
            ->where('status', 'published')
            ->findOrFail($id);

        return view('public.show', compact('information'));
    }
}