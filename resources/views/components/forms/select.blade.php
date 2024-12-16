@props(['options', 'selected'])


<div x-data="{selected: '{{$selected}}', open: false,  options: {{json_encode($options)}} }"
     x-modelable="selected"
    {{$attributes}}
>
    <x-dropdown x-bind:open="open">
        <x-slot:trigger>
            <div
                class="w-full h-12 bg-alice-blue rounded-lg mt-3 px-6 py-3 flex items-center justify-between cursor-pointer select-none"
            >
                <p x-text="options[selected]"></p>
                <img src="/images/shared/icon-arrow-up.svg" alt=""
                     :class="open ? '' : 'rotate-180'" class="transition">
            </div>
        </x-slot:trigger>

        <x-slot:content>
            <div
                class="paragraph-1 bg-white shadow-lg w-full rounded-lg mt-4 cursor-pointer border">

                <template x-for="(value, key, index) in options" :key="key">
                    <x-menu-link class="flex justify-between items-center border-b last:border-0" @click="selected = key; open = false">
                        <span x-text="value"></span>
                        <template x-if="selected === key">
                            <img src="/images/shared/icon-check.svg" alt="Selected">
                        </template>
                    </x-menu-link>
                </template>

            </div>
        </x-slot:content>
    </x-dropdown>
</div>
