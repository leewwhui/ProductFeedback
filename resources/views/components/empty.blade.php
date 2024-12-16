<div class="w-full h-full bg-white rounded-lg flex flex-col gap-[53px] items-center justify-center">
    <img src="/images/suggestions/illustration-empty.svg" alt="">

    <div class="w-1/2 flex flex-col justify-center gap-4">
        <h2 class="text-2xl font-bold text-center text-gunmetal">There is no feedback yet.</h2>
        <p class="text-center text-lg text-slate">Got a suggestion? Found a bug that needs to be squashed? We love
            hearing about new ideas to
            improve our app.</p>
    </div>

    <a
        class="btn-primary-purple flex items-center gap-2 justify-center" href="{{route("feedback.create")}}"
        wire:navigate
    >
        <img src="/images/shared/icon-plus.svg" alt="">
        <p>Add Feedback</p>
    </a>
</div>
