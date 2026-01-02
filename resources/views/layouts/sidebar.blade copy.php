@php
use App\Helpers\MenuHelper;

$menuGroups = MenuHelper::getMenuGroups();
$currentRouteName = request()->route()->getName();
@endphp

<aside id="sidebar"
    class="fixed top-0 left-0 z-30 h-screen bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-800
           transition-all duration-300 ease-in-out"
    x-data="{
        openSubmenus: {},
    
        init() {
            const currentRoute = '{{ $currentRouteName }}';
    
            @foreach ($menuGroups as $groupIndex => $menuGroup)
                @foreach ($menuGroup['items'] as $itemIndex => $item)
                    @if (!empty($item['subItems']))
                        @foreach ($item['subItems'] as $subItem)
                            if (currentRoute === '{{ $subItem['path'] }}') {
                                this.openSubmenus['{{ $groupIndex }}-{{ $itemIndex }}'] = true;
                            } @endforeach
            @endif
            @endforeach
            @endforeach
        },
    
        toggleSubmenu(groupIndex, itemIndex) {
            const key = groupIndex + '-' + itemIndex;
            this.openSubmenus[key] = !this.openSubmenus[key];
        },
    
        isSubmenuOpen(groupIndex, itemIndex) {
            return this.openSubmenus[groupIndex + '-' + itemIndex] || false;
        },
    
        isActive(routeName) {
            return routeName && routeName === '{{ $currentRouteName }}';
        }
    }"
    :class="{
        'w-[290px]': $store.sidebar.isExpanded || $store.sidebar.isHovered || $store.sidebar.isMobileOpen,
        'w-[90px]': !$store.sidebar.isExpanded && !$store.sidebar.isHovered,
        'translate-x-0': $store.sidebar.isMobileOpen,
        '-translate-x-full xl:translate-x-0': !$store.sidebar.isMobileOpen
    }"
    @mouseenter="if (!$store.sidebar.isExpanded) $store.sidebar.setHovered(true)"
    @mouseleave="$store.sidebar.setHovered(false)">

    <!-- LOGO -->
    <div class="pt-8 pb-7 px-3 flex"
        :class="(!$store.sidebar.isExpanded && !$store.sidebar.isHovered && !$store.sidebar.isMobileOpen) ?
        'justify-center' :
        'justify-start'">

        <a href="/" class="flex items-center gap-2">
            <img src="{{ asset('images/Lambang_Kabupaten_Kubu_Raya2.png') }}" class="w-10 h-auto" />
            <span x-show="$store.sidebar.isExpanded || $store.sidebar.isHovered || $store.sidebar.isMobileOpen"
                class="font-semibold text-lg text-[#364878] dark:text-white">
                E-SKRD
            </span>
        </a>
    </div>

    <!-- MENU -->
    <div class="flex flex-col overflow-y-auto no-scrollbar px-3">
        @foreach ($menuGroups as $groupIndex => $menuGroup)

        <!-- GROUP TITLE -->
        <h2 class="mb-3 text-xs uppercase text-gray-400"
            x-show="$store.sidebar.isExpanded || $store.sidebar.isHovered || $store.sidebar.isMobileOpen">
            {{ $menuGroup['title'] }}
        </h2>

        <ul class="flex flex-col gap-1 mb-6">
            @foreach ($menuGroup['items'] as $itemIndex => $item)

            <!-- ===== SUBMENU ===== -->
            @if (!empty($item['subItems']))
            <li>
                <button @click="toggleSubmenu({{ $groupIndex }}, {{ $itemIndex }})"
                    class="menu-item w-full flex items-center gap-3"
                    :class="isSubmenuOpen({{ $groupIndex }}, {{ $itemIndex }}) ?
                                    'menu-item-active' :
                                    'menu-item-inactive'">

                    {!! MenuHelper::getIconSvg($item['icon']) !!}

                    <span
                        x-show="$store.sidebar.isExpanded || $store.sidebar.isHovered || $store.sidebar.isMobileOpen"
                        class="flex-1 text-left">
                        {{ $item['name'] }}
                    </span>

                    <svg x-show="$store.sidebar.isExpanded || $store.sidebar.isHovered || $store.sidebar.isMobileOpen"
                        class="w-4 h-4 transition-transform"
                        :class="isSubmenuOpen({{ $groupIndex }}, {{ $itemIndex }}) ? 'rotate-180' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- SUBMENU LIST -->
                <ul x-show="isSubmenuOpen({{ $groupIndex }}, {{ $itemIndex }})"
                    class="mt-2 ml-9 space-y-1">
                    @foreach ($item['subItems'] as $subItem)
                    <li>
                        <a href="{{ route($subItem['path']) }}"
                            class="menu-dropdown-item flex items-center gap-2"
                            :class="isActive('{{ $subItem['path'] }}') ?
                                                'menu-dropdown-item-active' :
                                                'menu-dropdown-item-inactive'">

                            {{ $subItem['name'] }}

                            @if (!empty($subItem['new']))
                            <span class="menu-dropdown-badge">new</span>
                            @endif

                            @if (!empty($subItem['pro']))
                            <span class="menu-dropdown-badge-pro">pro</span>
                            @endif
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>

            <!-- ===== SINGLE MENU ===== -->
            @else
            <li>
                <a href="{{ route($item['path']) }}" class="menu-item flex items-center gap-3"
                    :class="isActive('{{ $item['path'] }}') ?
                                    'menu-item-active' :
                                    'menu-item-inactive'">

                    {!! MenuHelper::getIconSvg($item['icon']) !!}

                    <span
                        x-show="$store.sidebar.isExpanded || $store.sidebar.isHovered || $store.sidebar.isMobileOpen">
                        {{ $item['name'] }}
                    </span>
                </a>
            </li>
            @endif

            @endforeach
        </ul>
        @endforeach
    </div>
</aside>

<!-- MOBILE OVERLAY -->
<div x-show="$store.sidebar.isMobileOpen" @click="$store.sidebar.setMobileOpen(false)"
    class="fixed inset-0 bg-black/50 z-30 xl:hidden">
</div>