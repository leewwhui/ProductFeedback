<div class="flex gap-8 items-center w-full" x-data="{open: false}">
    <img src="{{$comment->user->image}}" alt="" class="rounded-full size-10 self-start">

    <div class="space-y-4 w-full">
        <div class="flex justify-between">
            <div>
                <h4 class="heading-4">{{$comment->user->name}}</h4>
                <h4 class="heading-4 text-slate">{{'@' . $comment->user->username}}</h4>
            </div>
            <button @click="open = true" class="heading-4 cursor-pointer hover:underline text-royal-blue">Replay
            </button>
        </div>


        <p class="paragraph-2 text-slate">
            @if($reply)
                <span class="text-primary-purple font-bold">{{'@' . $reply->user->username}}</span>
            @endif
            {{$comment->content}}
        </p>

        <form wire:submit="save" x-show="open" class="justify-between gap-4 flex" @click.away="open = false">
            <div class="flex-1">
                <x-forms.textarea
                    :error="$errors->has('content')"
                    :error_message="$errors->first('content')"
                    class="border-royal-blue border h-20" wire:model="content"
                />
            </div>
            <button class="btn-primary-purple w-fit h-fit" type="submit">Post Reply</button>
        </form>
    </div>
</div>

