<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $query=Product::query();
        $query->with(['category:id,name','brand:id,name'])
        ->select('id','image','name','price_buy','category_id','brand_id','status')
        ->orderBy('created_at','desc')
        ->where('status',1)
        ->get();
        $products=$query->paginate(8);
        return view('layouts.frontend.pages.products.index',compact('products'));
    }
    
    public function detail(){
        return view('layouts.frontend.pages.products.detail');
    }
}
