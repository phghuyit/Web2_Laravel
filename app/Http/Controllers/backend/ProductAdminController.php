<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query= Product::query();
        $query->with(['category:id,name','brand:id,name']);
        $query->select('id','name','slug','image','price_buy','category_id','brand_id','created_at','qty','status');
        $query->whereNull('deleted_at');
        if($request->filled('name')){
            $query->where([ ['name','like','%'.$request->input('name').'%'],
                            ['slug','like','%'.$request->input('name').'%']]);
        }

        if($request->filled('brand_id')){
            $query->where('brand_id',$request->input('brand_id'));
        }

        if($request->filled('cat_id')){
            $query->where('category_id',$request->input('cat_id'));
        }

        if($request->filled('sort_by')){
            $sort=$request->input('sort_by');
            switch($sort){
                case 'price_asc':
                    $query->orderBy('price_buy','asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price_buy','desc');
                    break;
                case 'name_asc':
                    $query->orderBy('name','asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name','desc');
                    break;
                default:
                    $query->orderBy('created_at','desc');
                    break;
            }
        }
        $products=$query->paginate(5)->withQueryString();

        $brands=Brand::select('id','name')->get();
        $cats=Category::select('id','name')->get();


        return view('layouts.backend.pages.product.index',compact('products','brands','cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
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
        //

    }

    public function trash()
    {
        //
        $products=Product::onlyTrashed()->paginate(5);
        $brands=Brand::select('id','name')->get();
        $cats=Category::select('id','name')->get();
        return view('layouts.backend.pages.product.trash',compact('products','brands','cats'));
    }
}
