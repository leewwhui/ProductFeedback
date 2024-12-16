<?php

namespace App\View\Components;

use App\Enums\Categories;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navigation extends Component
{
    public string $tag;
    public $feedbacks;
    public $colors;

    /**
     * Create a new component instance.
     */
    public function __construct($feedbacks)
    {
        $this->tag = request('tag') ?? Categories::ALL->value;
        $this->feedbacks = $feedbacks;
        $this->colors = config('constants.colors');
    }

    public function highlight(string $category, string $tag): string
    {
        return $category === $tag ? "bg-royal-blue text-white" : "bg-ghost text-royal-blue";
    }

    public function getStatusNumber($status)
    {
        return $this->feedbacks->where('status', $status)->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation');
    }
}
