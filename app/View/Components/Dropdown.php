<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dropdown extends Component
{
    public mixed $trigger;
    public mixed $content;
    public bool $open;

    /**
     * Create a new component instance.
     */
    public function __construct(mixed $trigger = null, mixed $content = null, bool $open = false)
    {
        $this->trigger = $trigger;
        $this->content = $content;
        $this->open = $open;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dropdown');
    }
}

