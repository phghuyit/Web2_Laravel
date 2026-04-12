<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->with(['category:id,name', 'brand:id,name'])
            ->select('id', 'image', 'name', 'price_buy','slug', 'category_id', 'brand_id', 'status','is_sale','price_sale')
            ->where('status', 1)
            ->latest()
            ->limit(4)
            ->get();

        return view('layouts.frontend.pages.home', compact('products'));
    }
}
