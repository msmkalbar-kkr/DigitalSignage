@props(['pageTitle' => 'Page'])

<div class="flex flex-wrap items-center justify-between gap-3 mb-6">
    <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90">
        {{ $pageTitle }}
    </h2>
    <nav>
        <ol class="flex items-center gap-1.5">
            <li>

            </li>
            <li class="text-sm text-gray-800 dark:text-white/90">
                {{ $pageTitle }}
            </li>
        </ol>
    </nav>
</div>
