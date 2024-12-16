@props(['error' => false, 'error_message' => ''])

<div>
    <textarea
        {{ $attributes->merge(['class' => 'w-full h-24 bg-alice-blue rounded-lg px-6 py-3' . ($error ? ' border-2 border-red-500' : '')]) }}
    ></textarea>

    <p class="text-red-500">{{$error_message}}</p>
</div>
