<?php

namespace App\View\Components\ui;

use App\Models\Brand;
use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AllProductFilter extends Component
{
    public $cate;

    public $brand;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
        $this->cate = Category::select('id', 'name')->where('status', 1)->get();
        $this->brand = Brand::select('id', 'name')->where('status', 1)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.all-product-filter');
    }
}
