@extends('layouts.app')
@section('title', 'Laravel - Roadmap')

@section('content')
    <div class="w-4/5 mx-auto flex gap-8 justify-between flex-col">
        <div class="w-full rounded-xl bg-gunmetal py-[27px] px-[32px]">
            <div class="flex items-center h-full justify-between">
                <div class="flex items-center h-full flex-col text-white justify-center">
                    <x-go-back/>
                    <h1 class="heading-1 text-white">Roadmap</h1>
                </div>

                <a class="btn-primary-purple flex items-center gap-2" href="{{route('feedback.create')}}" wire:navigate>
                    <img src="/images/shared/icon-plus.svg" alt="">
                    <p>Add Feedback</p>
                </a>
            </div>
        </div>


        <div class="flex-1 grid grid-cols-3 gap-8">
            <div class="w-full space-y-8">
                <div class="space-y-1">
                    <h3 class="heading-3">Planned</h3>
                    <p class="paragraph-1">Ideas prioritized for research</p>
                </div>

                <div class="space-y-6">
                    @foreach($plannedFeedbacks as $feedback)
                        <x-roadmap-card :feedback="$feedback"/>
                    @endforeach
                </div>
            </div>

            <div class="w-full space-y-8">
                <div class="space-y-1">
                    <h3 class="heading-3">In-Progress</h3>
                    <p class="paragraph-1">Currently being developed</p>
                </div>

                <div class="space-y-6">
                    @foreach($inProgressFeedbacks as $feedback)
                        <x-roadmap-card :feedback="$feedback"/>
                    @endforeach
                </div>
            </div>

            <div class="w-full space-y-8">
                <div class="space-y-1">
                    <h3 class="heading-3">Live</h3>
                    <p class="paragraph-1">Released features</p>
                </div>

                <div class="space-y-6">
                    @foreach($liveFeedbacks as $feedback)
                        <x-roadmap-card :feedback="$feedback"/>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection

