<?php

namespace App\View\Components\frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Post;

class HotNews extends Component
{
    public $posts;
    public function __construct()
    {
        //
        $this->posts = Post::query()->offset(1)->latest()->limit(5)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.hot-news');
    }
}
