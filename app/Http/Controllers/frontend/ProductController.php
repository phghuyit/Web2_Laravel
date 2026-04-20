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

        $relatedProducts = Product::where('status', 1)
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        return view('layouts.frontend.pages.products.detail', compact('product', 'relatedProducts'));
    }

    public function liveSearch(Request $request)
    {
        if ($request->ajax()) {
            $keyword = $request->keyword;
            $products = Product::select('slug', 'name', 'image', 'brand_id')
                ->with('brand:id,name')
                ->where('status', 1)
                ->whereNull('deleted_at')
                ->when($keyword, function ($q) use ($keyword) {
                    $q->where(fn ($key) => $key->where('name', 'like', "%{$keyword}%")
                        ->orWhere('slug', 'like', "%{$keyword}%"));
                })
                ->limit(5)
                ->get();

            return response()->json([
                'product_data' => view('components.frontend.partials.header', [
                    'products' => $products,
                    'menu' => [],
                ])->fragment('search-results'),
            ]);
        }

        return back()->withInput();
    }
}
