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
        ->select('id','image','name','slug','price_buy','category_id','brand_id','status','is_sale','price_sale')
        ->orderBy('created_at','desc')
        ->where('status',1)
        ->get();
        $products=$query->paginate(8);
        return view('layouts.frontend.pages.products.index',compact('products'));
    }

    public function detail($slug){
        $product=Product::with(['category:id,name','brand:id,name'])
        ->where('slug',$slug)
        ->firstOrFail();

        $product->increment('views');

        return view('layouts.frontend.pages.products.detail',compact('product'));
    }
}
