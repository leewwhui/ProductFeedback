@props(['currentSort'])

<div x-data="{open: false}">
    <x-dropdown x-bind:open="open">
        <x-slot:trigger>
            <button class="text-white text-sm flex items-center gap-2">
                Sort by :<span class="font-bold">{{\App\Enums\Sorts::tryFrom($currentSort)->real()}}</span>

                <svg width="10" height="7" xmlns="http://www.w3.org/2000/svg"
                     :class="open ? '' : 'rotate-180'"
                     class="transition"
                >
                    <path d="M1 6l4-4 4 4" stroke="#fff" stroke-width="2" fill="none"
                          fill-rule="evenodd"/>
                </svg>
            </button>
        </x-slot:trigger>

        <x-slot:content>
            <div class="paragraph-1 bg-white shadow-lg w-[255px] rounded-lg mt-10 cursor-pointer border last:border-0">
                @foreach(\App\Enums\Sorts::cases() as $sort)
                    <a href={{route('feedback.index', array_merge(request()->query(), ['sort' => $sort->value]))}} wire:navigate>
                        <x-menu-link class="flex justify-between items-center border-b">
                            {{$sort->real()}}

                            @if($sort->value === $currentSort)
                                <img src="/images/shared/icon-check.svg" alt="Selected">
                            @endif
                        </x-menu-link>
                    </a>
                @endforeach
            </div>
        </x-slot:content>
    </x-dropdown>
</div>
