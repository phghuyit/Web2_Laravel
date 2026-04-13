<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Product::query();

            $query->with(['category:id,name', 'brand:id,name'])
                ->select('id', 'image', 'name', 'slug', 'price_buy', 'category_id', 'brand_id', 'status', 'is_sale', 'price_sale')
                ->orderBy('created_at', 'desc')
                ->where('status', 1);

            if ($request->filled('categories')) {
                $query->whereIn('category_id', $request->categories);
            }
            if ($request->filled('auth_id')) {
                $query->where('brand_id', $request->auth_id);
            }
            if ($request->filled('minprice')) {
                $query->where('price_buy', '>=', $request->minprice);
            }
            if ($request->filled('maxprice')) {
                $query->where('price_buy', '<=', $request->maxprice);
            }
            $products = $query->paginate(8);

            return response()->json([
                'product_html' => view('layouts.frontend.pages.products.index', compact('products'))->fragment('product-list'),
                'paginator_html' => $products->links()->render(),
            ]);
        }

        $query = Product::query();
        $query->with(['category:id,name', 'brand:id,name'])
            ->select('id', 'image', 'name', 'slug', 'price_buy', 'category_id', 'brand_id', 'status', 'is_sale', 'price_sale')
            ->orderBy('created_at', 'desc')
            ->where('status', 1);
        $products = $query->paginate(8);

        return view('layouts.frontend.pages.products.index', compact('products'));
    }

    public function detail($slug)
    {
        $product = Product::with(['category:id,name', 'brand:id,name'])
            ->where('slug', $slug)
            ->firstOrFail();

        $product->increment('views');

        return view('layouts.frontend.pages.products.detail', compact('product'));
    }
}
