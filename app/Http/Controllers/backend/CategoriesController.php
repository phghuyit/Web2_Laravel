<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Category::query();
        $query->select('id','name','description','parent_id','status','slug');

        if($request->filled('name')){
            $query->where('name','like','%'.$request->input('auth-name').'%');
        }
        if($request->filled('id')){
            $query->where('id',$request->input('auth-id'));
        }
        if($request->filled('sort_by')){
            $sort=$request->input('sort_by');
            switch($sort){
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
        $cates=$query->paginate(5);
        return view('layouts.backend.pages.categories.index',compact('cates'));
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
}
