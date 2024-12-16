@props(['post_number'])

<div class="w-full rounded-xl bg-gunmetal h-[72px] px-[24px]">
    <div class="flex items-center h-full justify-between">
        <div class="flex items-center gap-8">
            <div class="flex gap-4">
                <img src="/images/shared/icon-suggestions.svg" alt="suggestion">
                <p class="font-bold text-lg text-white">{{$post_number}} Suggestions</p>
            </div>
            <x-header.header-dropdown :current-sort="$sort"></x-header.header-dropdown>
        </div>

        <a class="btn-primary-purple flex items-center gap-2" href="{{route('feedback.create')}}" wire:navigate>
            <img src="/images/shared/icon-plus.svg" alt="">
            <p>Add Feedback</p>
        </a>
    </div>
</div>
