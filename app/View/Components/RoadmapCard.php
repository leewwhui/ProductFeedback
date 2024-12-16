<?php

namespace App\View\Components;

use App\Models\Feedback;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RoadmapCard extends Component
{
    public Feedback $feedback;
    public $color;

    /**
     * Create a new component instance.
     */
    public function __construct($feedback)
    {
        $this->feedback = $feedback;
        $this->color = config('constants.colors')[$feedback->status];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.roadmap-card');
    }
}
