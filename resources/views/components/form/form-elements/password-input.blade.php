<div>
    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
        {{ $label ?? 'Password' }}
    </label>

    <div x-data="{ showPassword: false }" class="relative">
        <input :type="showPassword ? 'text' : 'password'" placeholder="{{ $placeholder ?? 'Enter your password' }}"
            name="{{ $name ?? '' }}" id="{{ $id ?? '' }}" value="{{ $value ?? '' }}"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 
                dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 
                bg-transparent px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 
                focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 
                dark:text-white/90 dark:placeholder:text-white/30" />

        <span @click="showPassword = !showPassword" class="absolute top-1/2 right-4 -translate-y-1/2 cursor-pointer">

            {{-- Icon Hidden --}}
            <svg x-show="!showPassword" class="fill-gray-500 dark:fill-gray-400" width="20" height="20"
                viewBox="0 0 20 20">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M10.0002 13.8619C7.23361 13.8619 4.86803 12.1372 3.92328 9.70241C4.86804 7.26761 7.23361 5.54297 10.0002 5.54297C12.7667 5.54297 15.1323 7.26762 16.0771 9.70243C15.1323 12.1372 12.7667 13.8619 10.0002 13.8619Z" />
            </svg>

            {{-- Icon Shown --}}
            <svg x-show="showPassword" class="fill-gray-500 dark:fill-gray-400" width="20" height="20"
                viewBox="0 0 20 20">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M4.63803 3.57709C4.34513 3.2842 3.87026 3.2842 3.57737 3.57709C3.28447 3.86999 3.28447 4.34486 3.57737 4.63775L4.85323 5.91362C3.74609 6.84199 2.89363 8.06395 2.4155 9.45936Z" />
            </svg>

        </span>
    </div>
</div>
