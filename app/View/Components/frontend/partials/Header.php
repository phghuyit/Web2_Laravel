<?php

namespace App\View\Components\frontend\partials;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public $header;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
        $this->header = Menu::query()->where('status', 1)->where('position','header')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.partials.header');
    }
}
