<div class="border-b border-1 pb-8 space-y-8 last:border-0 relative">
    <livewire:comment-card :comment="$comment"/>

    @if(count($replies) !== 0)
        <div class="pl-12 space-y-8">
            @foreach($replies as $child)
                @php
                    $reply = $replies->concat(collect([$comment]))->first(fn($r) => $r->id === $child->reply_id);
                @endphp
                <livewire:comment-card
                    :comment="$child"
                    :reply="$reply"
                    wire:key="{{$child->id}}"
                />
            @endforeach
        </div>

        <div class="absolute w-[1.5px] h-3/5 bg-slate/10 top-7 left-5 -translate-x-1/2"></div>
    @endif
</div>
