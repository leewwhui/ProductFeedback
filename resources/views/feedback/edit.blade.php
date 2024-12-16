@props(["feedback"])

@extends('layouts.app')
@section('title', 'Laravel - Feedback')

@section('content')
    <div class="w-1/3 mx-auto space-y-16">
        <x-go-back></x-go-back>

        <div class="w-full bg-white rounded-lg px-10 py-12 relative space-y-10">
            <div>
                <img src="/images/shared/icon-new-feedback.svg" alt="" class="absolute left-10 top-0 -translate-y-1/2">
                <h1 class="heading-1">
                    {{$feedback->title}}
                </h1>
            </div>

            <livewire:edit-feedback-form :feedback="$feedback" />
        </div>
    </div>
@endsection

