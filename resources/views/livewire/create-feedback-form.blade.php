<form class="space-y-6" wire:submit="save()">
    <div>
        <h4 class="heading-4">Feedback Title</h4>
        <p class="paragraph-2 mt-[2px]">Add a short, descriptive headline</p>

        <x-forms.input
            :error="$errors->has('title')"
            :error_message="$errors->first('title')"
            wire:model="title"
            class="mt-3"
        />
    </div>

    <div>
        <h4 class="heading-4">Category</h4>
        <p class="paragraph-2 mt-[2px]">Choose a category for your feedback</p>
        <x-forms.select :options="$categories" :selected="$category" wire:model="category"/>
    </div>

    <div>
        <h4 class="heading-4">Feedback Detail</h4>
        <p class="paragraph-2 mt-[2px]">
            Include any specific comments on what should be improved, added, etc.
        </p>

        <x-forms.textarea
            :error="$errors->has('description')"
            :error_message="$errors->first('description')"
            wire:model="description"
            class="mt-3"
        />
    </div>

    <div class="w-full mt-8 flex items-center justify-end gap-4">
        <button class="btn-slate" onclick="history.back()">Cancel</button>
        <button class="btn-primary-purple">Add Feedback</button>
    </div>
</form>