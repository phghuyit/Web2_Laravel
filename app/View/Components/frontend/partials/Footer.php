<?php

namespace App\View\Components\frontend\partials;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public $footer;
    public function __construct()
    {
        //
        $this->footer = Menu::query()->where('status', 1)->where('position','footer')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.partials.footer');
    }
}
