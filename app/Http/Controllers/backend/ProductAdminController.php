<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Product::query();
        $query->with(['category:id,name', 'brand:id,name']);
        $query->select('id', 'name', 'slug', 'image', 'price_buy', 'category_id', 'brand_id', 'created_at', 'qty', 'status');
        $query->whereNull('deleted_at');

        $query->when($request->filled('name'), function ($q) use ($request) {
            $term = $request->input('name');

            $q->where(fn ($sub) => $sub->where('name', 'like', "%{$term}%")
                ->orWhere('slug', 'like', "%{$term}%"));

        });

        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->input('brand_id'));
        }

        if ($request->filled('cat_id')) {
            $query->where('category_id', $request->input('cat_id'));
        }

        if ($request->filled('sort_by')) {
            $sort = $request->input('sort_by');
            switch ($sort) {
                case 'price_asc':
                    $query->orderBy('price_buy', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price_buy', 'desc');
                    break;
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                default:
                    $query->orderBy('id', 'asc');
                    break;
            }
        }
        $products = $query->paginate(5)->withQueryString();

        $brands = Brand::select('id', 'name')->get();
        $cats = Category::select('id', 'name')->get();

        return view('layouts.backend.pages.product.index', compact('products', 'brands', 'cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $brands = Brand::select('id', 'name')->get();
        $cats = Category::select('id', 'name')->get();

        return view('layouts.backend.pages.product.create', compact('brands', 'cats'));
    }

    public function restore(string $id)
    {
        //
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();

        return redirect()->route('product.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
        $product = new Product;
        $slug = Str::of($request->name)->slug('-');
        $product->name = $request->name;
        $product->slug = $slug;

        if ($request->has('image')) {
            $file = $request->file('image');
            $filename = $slug.'_'.$file->getClientOriginalName();
            $path = $file->storeAs('products', $filename, 'public');
            $product->image = $path;
        }
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->price_buy = $request->price_buy;

        $product->qty = $request->qty;
        if ($request->has('description')) {
            $product->description = $request->description;
        }
        // $product->created_by=Auth::id()??1;
        $product->status = $request->status;
        $product->created_at = date('Y-m-d H:i:s');
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = Product::findOrFail($id);
        if ($product) {
            $brands = Brand::select('id', 'name')->get();
            $cats = Category::select('id', 'name')->get();

            return view('layouts.backend.pages.product.showDetail', compact('product', 'brands', 'cats'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::findOrFail($id);
        if ($product) {
            $brands = Brand::select('id', 'name')->get();
            $cats = Category::select('id', 'name')->get();

            return view('layouts.backend.pages.product.edit', compact('product', 'brands', 'cats'));
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        //
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $slug = Str::of($request->name)->slug('-');
        $product->slug = $slug;

        if ($request->has('image')) {
            $file = $request->file('image');
            $filename = $slug.'_'.$file->getClientOriginalName();
            $path = $file->storeAs('products', $filename, 'public');
            $product->image = $path;
        }
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->price_buy = $request->price_buy;

        $product->qty = $request->qty;
        if ($request->has('description')) {
            $product->description = $request->description;
        }
        // $product->created_by=Auth::id()??1;
        $product->status = $request->status??1;
        $product->created_at = date('Y-m-d H:i:s');
        $product->save();

        return redirect()->route('product.index');
    }

    public function delete(string $id)
    {
        //
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('product.trash');
    }

    public function destroy(string $id)
    {
        //
        $product = Product::withTrashed()->findOrFail($id);

        $product->forceDelete();

        return redirect()->route('product.trash');
    }

    public function trash(Request $request)
    {
        //
        $query = Product::onlyTrashed();
        $query->with(['category:id,name', 'brand:id,name']);
        $query->select('id', 'name', 'slug', 'image', 'price_buy', 'category_id', 'brand_id', 'created_at', 'qty', 'status');

        if ($request->filled('name')) {
            $query->where([['name', 'like', '%'.$request->input('name').'%'],
                ['slug', 'like', '%'.$request->input('name').'%']]);
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
                default:
                    $query->orderBy('created_at','desc');
                    break;
            }
        }
        $products = $query->paginate(5)->withQueryString();

        return view('layouts.backend.pages.product.trash',compact('products'));
    }
}
