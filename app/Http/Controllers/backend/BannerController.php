<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Banner::query();
        $query->select('id', 'name', 'description', 'link', 'sort_order', 'position', 'image', 'status');
        $query->whereNull('deleted_at');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%'.$request->input('name').'%');
        }

        if ($request->filled('sort_by')) {
            $sort = $request->input('sort_by');
            switch ($sort) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'sort_order_asc':
                    $query->orderBy('sort_order', 'asc');
                    break;
                case 'sort_order_desc':
                    $query->orderBy('sort_order', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        }
        $banners = $query->paginate(5)->withQueryString();

        return view('layouts.backend.pages.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('layouts.backend.pages.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $banner = new Banner;
        $banner->name = $request->name;
        $banner->description = $request->description;
        $banner->link = $request->link;
        $banner->sort_order = $request->sort_order;
        $banner->position = $request->position;

        if ($request->has('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('banners', $filename, 'public');
            $banner->image = $path;
        }

        $banner->status = $request->status ?? 1;
        $banner->created_at = date('Y-m-d H:i:s');
        $banner->save();

        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $banner = Banner::findOrFail($id);

        return view('layouts.backend.pages.banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $banner = Banner::findOrFail($id);

        return view('layouts.backend.pages.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::findOrFail($id);
        $banner->name = $request->name;
        $banner->description = $request->description;
        $banner->link = $request->link;
        $banner->sort_order = $request->sort_order;
        $banner->position = $request->position;

        if ($request->has('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('banners', $filename, 'public');
            $banner->image = $path;
        }

        $banner->status = $request->status ?? 1;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->save();

        return redirect()->route('banner.index');
    }

    public function restore(string $id)
    {
        $banner = Banner::onlyTrashed()->findOrFail($id);
        $banner->restore();

        return redirect()->route('banner.index');
    }

    public function delete(string $id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect()->route('banner.trash');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::withTrashed()->findOrFail($id);
        $banner->forceDelete();

        return redirect()->route('banner.trash');
    }

    public function trash(Request $request)
    {
        $query = Banner::onlyTrashed()->select('id', 'name', 'description', 'link', 'sort_order', 'position', 'image', 'status');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%'.$request->input('name').'%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('sort_by')) {
            $sort = $request->input('sort_by');
            switch ($sort) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'sort_order_asc':
                    $query->orderBy('sort_order', 'asc');
                    break;
                case 'sort_order_desc':
                    $query->orderBy('sort_order', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        }

        $banners = $query->paginate(5)->withQueryString();

        return view('layouts.backend.pages.banner.trash', compact('banners'));
    }
}
