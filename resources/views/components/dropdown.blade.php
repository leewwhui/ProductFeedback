<div x-data="{ open }" class="relative">
    <div @click="open = !open">{{$trigger}}</div>
    <div x-show="open" class="absolute left-0 w-full z-20" @click.outside="open = false">
        {{$content}}
    </div>
</div>
