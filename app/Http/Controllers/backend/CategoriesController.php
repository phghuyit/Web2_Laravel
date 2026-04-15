<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Category::query();
        $query->select('id', 'name', 'description', 'image', 'parent_id', 'sort_order', 'status', 'slug');
        $query->whereNull('deleted_at');
        if ($request->filled('name')) {
            $query->where([['name', 'like', '%'.$request->input('name').'%'],
                ['slug', 'like', '%'.$request->input('name').'%']]);
        }

        if ($request->filled('sort_by')) {
            $sort = $request->input('sort_by');
            switch ($sort) {
                case 'asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'desc':
                    $query->orderBy('name', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        }
        $cates = $query->paginate(5)->withQueryString();

        return view('layouts.backend.pages.categories.index', compact('cates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.backend.pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $cate = Category::findOrFail($id);

        return view('layouts.backend.pages.categories.edit', compact('cate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cate = Category::findOrFail($id);
        $cate->delete();

        return redirect()->route('cate.trash');
    }

    public function trash(Request $request)
    {
        $query = Category::onlyTrashed()->select('id', 'name', 'description', 'image', 'parent_id', 'sort_order', 'status', 'slug');

        if ($request->filled('name')) {
            $query->where([['name', 'like', '%'.$request->input('name').'%'],
                ['slug', 'like', '%'.$request->input('name').'%']]);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('sort_by')) {
            $sort = $request->input('sort_by');
            switch ($sort) {
                case 'asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'desc':
                    $query->orderBy('name', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        }

        $cates = $query->paginate(5)->withQueryString();

        return view('layouts.backend.pages.categories.trash', compact('cates'));
    }
}
