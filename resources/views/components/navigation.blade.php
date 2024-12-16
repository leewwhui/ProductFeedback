<div class="w-64 flex flex-col gap-6">
    <div
        class="w-full rounded-xl overflow-hidden bg-desktop-header h-[137px] bg-cover p-[24px] flex flex-col justify-end">
        <h1 class="heading-1 text-white">Frontend Mentor</h1>
        <p class="text-sm text-white/75 font-medium">Feedback Board</p>
    </div>

    <div class="w-full rounded-xl p-6 bg-white flex flex-wrap gap-x-2 gap-y-3.5">
        @foreach(\App\Enums\Categories::cases() as $category)
            <a href={{route('feedback.index', array_merge(request()->query(), ['tag' => $category->value]))}} wire:navigate>
                <div class="px-4 py-1 rounded-lg cursor-pointer {{$highlight($category->value, $tag)}}">
                    <p class="paragraph-3 {{$highlight($category->value, $tag)}}">{{$category->real()}}</p>
                </div>
            </a>
        @endforeach
    </div>

    <div class="w-full rounded-xl p-6 bg-white flex flex-col gap-6">
        <div class="flex w-full justify-between items-center">
            <h3 class="heading-3">Roadmap</h3>
            <a href="{{route('roadmap')}}"
               class="text-sm underline font-semibold text-royal-blue hover:text-royal-blue/75">View</a>
        </div>

        <div class="w-full flex flex-col gap-2">
            @foreach(config('constants.statues') as $statue => $value)
                <div class="w-full flex justify-between">
                    <div class="flex gap-1.5 items-center">
                        <div class="size-2 rounded-full {{$colors[$statue]}}"></div>
                        <p class="paragraph-1">{{$value}}</p>
                    </div>
                    <p class="paragraph-1 font-bold">{{$getStatusNumber($statue)}}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
