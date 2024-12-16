<?php

namespace App\View\Components;

use App\Enums\Sorts;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public $sort;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->sort = request()->query('sort') ?? Sorts::MOST_UPVOTES->value;;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header.header');
    }
}
