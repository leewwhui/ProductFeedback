@props(['feedbacks', 'planned_number'])

@extends('layouts.app')
@section('title', 'Laravel - suggestions')

@section('content')
    <div class="md:w-4/5 px-10 mx-auto flex md:flex-row flex-col gap-8 justify-between">

        <x-navigation :feedbacks="$feedbacks" />

        <div class="flex-1 space-y-6">
            <x-header :post_number="count($feedbacks)"></x-header>

            @if (count($feedbacks) === 0)
                <x-empty/>
            @else
                @foreach($feedbacks as $feedback)
                    <livewire:suggestion-card :feedback="$feedback"/>
                @endforeach
            @endempty
        </div>
    </div>
@endsection

