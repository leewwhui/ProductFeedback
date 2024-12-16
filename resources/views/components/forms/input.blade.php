@props(['error' => false, 'error_message' => ''])

<div>
    <input
        type="text"
        {{ $attributes->merge(['class' => 'w-full h-12 bg-alice-blue rounded-lg px-6 py-3' . ($error ? ' border-2 border-red-500' : '')]) }}
    >
    <p class="text-red-500">{{$error_message}}</p>
</div>
