<div class="w-full bg-white rounded-lg overflow-hidden flex flex-col h-[272px]">
    <div class="h-1.5 w-full {{$color}}"></div>

    <div class="flex-1 p-8 flex flex-col justify-between">
        <div class="space-y-1">
            <div class="flex items-center gap-4">
                <div class="size-2 {{$color}} rounded-full"></div>
                <p>{{\App\Enums\Status::from($feedback->status)->real()}}</p>
            </div>

            <div>
                <h1 class="heading-1">{{$feedback->title}}</h1>
                <p class="line-clamp-2 paragraph-1">{{$feedback->description}}</p>
            </div>
        </div>

        <div class="space-y-4">
            <div class="px-4 py-1 rounded-lg cursor-pointer bg-ghost w-fit">
                <p class="paragraph-3 text-royal-blue">{{\App\Enums\Status::from($feedback->status)->real()}}</p>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex bg-ghost rounded-lg items-center w-16 h-10 gap-1 justify-center">
                    <img src="/images/shared/icon-arrow-up.svg" alt="" class="w-4 h-2">
                    <p>{{$feedback->upvotes}}</p>
                </div>

                <div class="h-full flex gap-2 items-center">
                    <img src="/images/shared/icon-comments.svg" alt="" class="w-5 h-4">
                    <p class="paragraph-1 font-bold">{{count($feedback->comments)}}</p>
                </div>
            </div>
        </div>

    </div>
</div>
