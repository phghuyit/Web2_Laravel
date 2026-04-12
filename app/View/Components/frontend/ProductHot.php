<?php

namespace App\View\Components\frontend;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductHot extends Component
{
    public $products;

    public function __construct()
    {
        //
        $this->products=Product::query()
        ->with(['category:id,name','brand:id,name'])
        ->select('id','image','name','slug','price_buy','category_id','brand_id','is_sale','price_sale', 'views')
        ->orderBy('views','desc')
        ->limit(4)
        ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.product-hot');
    }
}
