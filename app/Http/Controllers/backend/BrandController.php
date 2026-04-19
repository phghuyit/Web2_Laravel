<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Brand::query();
        $query->select('id', 'name', 'description', 'image', 'status', 'slug');
        $query->whereNull('deleted_at');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%'.$request->input('name').'%')
                ->orwhere('slug', 'like', '%'.$request->input('name').'%');
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
        $brands = $query->paginate(5)->withQueryString();

        return view('layouts.backend.pages.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('layouts.backend.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->description = $request->description;

        if ($request->has('image')) {
            $file = $request->file('image');
            $filename = $brand->slug.'_'.$file->getClientOriginalName();
            $path = $file->storeAs('brands', $filename, 'public');
            $brand->image = $path;
        }

        $brand->status = $request->status ?? 1;
        $brand->created_at = date('Y-m-d H:i:s');
        $brand->save();

        return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::findOrFail($id);

        return view('layouts.backend.pages.brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);

        return view('layouts.backend.pages.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->description = $request->description;

        if ($request->has('image')) {
            $file = $request->file('image');
            $filename = $brand->slug.'_'.$file->getClientOriginalName();
            $path = $file->storeAs('brands', $filename, 'public');
            $brand->image = $path;
        }

        $brand->status = $request->status ?? 1;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->save();

        return redirect()->route('brand.index');
    }

    public function restore(string $id)
    {
        $brand = Brand::onlyTrashed()->findOrFail($id);
        $brand->restore();

        return redirect()->route('brand.index');
    }

    public function delete(string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('brand.trash');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::withTrashed()->findOrFail($id);
        $brand->forceDelete();

        return redirect()->route('brand.trash');
    }

    public function trash(Request $request)
    {
        $query = Brand::onlyTrashed()->select('id', 'name', 'description', 'image', 'status', 'slug', 'deleted_at');

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

        $brands = $query->paginate(5)->withQueryString();

        return view('layouts.backend.pages.brand.trash', compact('brands'));
    }
}
