<?php

namespace App\Http\Controllers;

use App\Enums\Categories;
use App\Enums\Sorts;
use App\Models\Comment;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tag = $request->query('tag') ?? Categories::ALL->value;
        $sort = $request->query('sort') ?? Sorts::MOST_UPVOTES->value;
        $feedbacksQuery = Feedback::with('comments');

        if ($tag !== Categories::ALL->value) {
            $feedbacksQuery->where('category', $tag);
        }

        $feedbacks = $feedbacksQuery->get();

        if ($sort === Sorts::MOST_UPVOTES->value) {
            $feedbacks = $feedbacks->sortByDesc('upvotes');
        }

        if ($sort === Sorts::LEAST_UPVOTES->value) {
            $feedbacks = $feedbacks->sortBy('upvotes');
        }

        if ($sort === Sorts::MOST_COMMENTS->value) {
            $feedbacks = $feedbacks->sortByDesc(function ($feedback) {
                return count($feedback->comments);
            });
        }

        if ($sort === Sorts::LEAST_COMMENTS->value) {
            $feedbacks = $feedbacks->sortBy(function ($feedback) {
                return count($feedback->comments);
            });
        }

        return view('feedback.index', ['feedbacks' => $feedbacks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        $comments = Comment::where('feedback_id', $feedback->id)->with('user')->get();
        return view('feedback.show', ['feedback' => $feedback, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        return view('feedback.edit', ['feedback' => $feedback]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
