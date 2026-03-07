<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class btn extends Component
{
    public $content,$url;
    /**
     * Create a new component instance.
     */
    public function __construct($url="",$content="")
    {
        //
        $this->url=$url;
        $this->content=$content;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.btn');
    }
}
