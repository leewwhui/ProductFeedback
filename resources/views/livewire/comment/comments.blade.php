<div class="w-full bg-white rounded-lg px-8 py-6 space-y-7">
    <h3 class="heading-3">{{count($comments)}} Comments</h3>

    <div class="space-y-8">
        @foreach($comments->filter(fn($c) => $c->parent_id===null) as $comment)
            <livewire:comment-item :comments="$comments" :comment="$comment" key="{{now()}}}"/>
        @endforeach
    </div>
</div>
