<div
    class="w-full bg-white rounded-lg px-8 py-7 flex justify-between items-center select-none cursor-pointer group"
    wire:click="navigateToFeedback({{$feedback->id}})"
>
    <div class="w-3/4 flex gap-10">
        <div class="flex flex-col bg-ghost rounded-lg items-center p-2.5 justify-between min-w-10 h-14">
            <img src="/images/shared/icon-arrow-up.svg" alt="" class="w-4 h-2">
            <p>{{$feedback->upvotes}}</p>
        </div>

        <div class="space-y-3.5">
            <div class="space-y-1">
                <h3 class="heading-3 {{$isInteractive ? "group-hover:text-royal-blue" : ""}} transition-all">
                    {{$feedback->title}}
                </h3>
                <p class="paragraph-1 line-clamp-1">{{$feedback->description}}</p>
            </div>

            <div class="px-4 py-1 rounded-lg bg-ghost w-fit select-none">
                <p class="text-royal-blue paragraph-3">
                    {{\App\Enums\Categories::tryFrom($feedback->category)->real()}}
                </p>
            </div>
        </div>
    </div>

    <div class="h-full flex gap-2 items-center">
        <img src="/images/shared/icon-comments.svg" alt="" class="w-5 h-4">
        <p class="paragraph-1 font-bold">{{count($feedback->comments)}}</p>
    </div>
</div>
