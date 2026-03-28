<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Brand::query();
        $query->select('id','name','description','image','status','slug');
        $query->whereNull('deleted_at');
        if($request->filled('name')){
            $query->where('name','like','%'.$request->input('name').'%')
            ->orwhere('slug','like','%'.$request->input('name').'%');
        }

        if($request->filled('sort_by')){
            $sort=$request->input('sort_by');
            switch($sort){
                case 'asc':
                    $query->orderBy('name','asc');
                    break;
                case 'desc':
                    $query->orderBy('name','desc');
                    break;
                default:
                    $query->orderBy('created_at','desc');
                    break;
            }
        }
        $brands=$query->paginate(5)->withQueryString();
        return view('layouts.backend.pages.brand.index',compact('brands'));
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

    public function trash(){
        
    }
}
