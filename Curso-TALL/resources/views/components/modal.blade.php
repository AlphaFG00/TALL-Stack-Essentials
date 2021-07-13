@props(['trigger'])

<div
    x-show="{{ $trigger }}"
    x-on:click.self="{{ $trigger}} = false"
    x-on:keydown.escape.window="{{ $trigger}} = false"
    class="fixed top-0 flex items-center w-full h-full bg-gray-900 bg-opacity-60">
    <div {{ $attributes->merge(['class' => 'p-8 m-auto bg-gray-200 shadow-2xl rounded-xl']) }}>
        {{ $slot }}
    </div>
</div>
