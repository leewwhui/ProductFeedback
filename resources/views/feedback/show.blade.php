@props(["feedback", "comments"])

@extends('layouts.app')
@section('title', 'Laravel - Feedback')

@section('content')
    <div class="md:w-1/2 px-5 mx-auto space-y-6">
        <div class="flex justify-between">
            <x-go-back></x-go-back>
            <a href="{{route('feedback.edit', $feedback->id)}}" class="btn-blue">
                Edit Feedback
            </a>
        </div>

        <livewire:suggestion-card :feedback="$feedback" :is-interactive="false"/>
        <livewire:comments :feedback_id="$feedback->id" :comments="$comments"/>
        <livewire:create-comments-form :feedback_id="$feedback->id"/>
    </div>
@endsection
