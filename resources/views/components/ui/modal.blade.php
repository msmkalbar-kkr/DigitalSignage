@props([
    'showCloseButton' => true,
])

<div x-show="modalOpen" x-cloak @keydown.escape.window="modalOpen = false"
    class="fixed inset-0 z-50 flex items-center justify-center p-5">

    {{-- Backdrop --}}
    <div class="fixed inset-0 bg-black/40 backdrop-blur-sm" @click="modalOpen = false"></div>

    {{-- Modal --}}
    <div @click.stop
        class="relative w-full rounded-2xl bg-white shadow-xl
               dark:bg-gray-900 {{ $attributes->get('class') }}">

        {{-- Close --}}
        @if ($showCloseButton)
            <button type="button" @click="modalOpen = false"
                class="absolute right-4 top-4 h-9 w-9 rounded-full
                       bg-gray-100 text-gray-500 hover:bg-gray-200">
                ✕
            </button>
        @endif

        <div class="p-6">
            {{ $slot }}
        </div>
    </div>
</div>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>
