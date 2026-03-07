<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public $title,$price,$author,$year,$rate,$sold,$img,$sale;
    /**
     * Create a new component instance.
     */
    public function __construct($title,$price,$author,$year=0,$img="",$rate=0,$sold=0,$sale=0)
    {
        //
        $this->title=$title;
        $this->price=$price;
        $this->author=$author;
        $this->year=$year;
        $this->rate=$rate;
        $this->sold=$sold;
        $this->img=$img;
        $this->sale=$sale;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-card');
    }
}
