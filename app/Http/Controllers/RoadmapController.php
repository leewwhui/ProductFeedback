<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Feedback;
use Illuminate\Http\Request;

class RoadmapController extends Controller
{
    public function __invoke(Request $request)
    {
        $feedbacks = Feedback::all();

        $plannedFeedbacks = $feedbacks->where('status', Status::PLANNED->value);
        $inProgressFeedbacks = $feedbacks->where('status', Status::IN_PROGRESS->value);
        $liveFeedbacks = $feedbacks->where('status', Status::LIVE->value);

        return view('roadmap.index', ['plannedFeedbacks' => $plannedFeedbacks, 'inProgressFeedbacks' => $inProgressFeedbacks, 'liveFeedbacks' => $liveFeedbacks]);
    }
}
