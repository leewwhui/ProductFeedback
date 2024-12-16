<form class="w-full bg-white rounded-lg px-8 py-6" wire:submit="save">
    <h1 class="heading-1">Add Comment</h1>

    <x-forms.textarea
        :error="$errors->has('content')"
        :error_message="$errors->first('content')"
        wire:model="content"
        placeholder="Type your comment here"
        id="comment_textarea"
        required
    />

    <div class="mt-4 flex items-center justify-between">
        <p class="paragraph-1">250 Characters left</p>
        <button type="submit" class="btn-primary-purple">Post Comment</button>
    </div>
</form>

@script
<script>
    $wire.on('comment-created', () => {
        document.getElementById('comment_textarea').value = "";
    });
</script>
@endscript
