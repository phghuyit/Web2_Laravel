<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $cate = new Category;
        $cate->name = $request->name;
        $cate->slug = Str::of($request->name)->slug('-');
        $cate->description = $request->description;
        $cate->parent_id = $request->parent_id;
        $cate->sort_order = $request->sort_order;

        if ($request->has('image')) {
            $file = $request->file('image');
            $filename = $cate->slug.'_'.$file->getClientOriginalName();
            $path = $file->storeAs('categories', $filename, 'public');
            $cate->image = $path;
        }

        $cate->status = $request->status ?? 1;
        $cate->created_at = date('Y-m-d H:i:s');
        $cate->save();

        return redirect()->route('cate.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cate = Category::findOrFail($id);

        return view('layouts.backend.pages.categories.show', compact('cate'));
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
        $cate = Category::findOrFail($id);
        $cate->name = $request->name;
        $cate->slug = Str::of($request->name)->slug('-');
        $cate->description = $request->description;
        $cate->parent_id = $request->parent_id;
        $cate->sort_order = $request->sort_order;

        if ($request->has('image')) {
            $file = $request->file('image');
            $filename = $cate->slug.'_'.$file->getClientOriginalName();
            $path = $file->storeAs('categories', $filename, 'public');
            $cate->image = $path;
        }

        $cate->status = $request->status ?? 1;
        $cate->updated_at = date('Y-m-d H:i:s');
        $cate->save();

        return redirect()->route('cate.index');
    }

    public function restore(string $id)
    {
        $cate = Category::onlyTrashed()->findOrFail($id);
        $cate->restore();

        return redirect()->route('cate.index');
    }

    public function delete(string $id)
    {
        $cate = Category::findOrFail($id);
        $cate->delete();

        return redirect()->route('cate.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cate = Category::withTrashed()->findOrFail($id);
        $cate->forceDelete();

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
