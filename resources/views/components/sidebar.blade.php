<div class="flex min-h-screen bg-gray-50 dark:bg-gray-900">
    <style>
        .activeNav {
            background-color: #bcc8d7;
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1);
        }

        .activeTitleNav {
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1);
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        .sidebar-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .sidebar-scrollbar {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .multi-menu-container li a {
            padding-left: 20px;
        }
    </style>

    <aside class="z-20 w-64 overflow-y-hidden bg-gray-200  dark:bg-gray-800 flex-shrink-0 asideShowHide"
        id="asideShowHide">
        <div class=" text-gray-500 dark:text-gray-400 ">
            <div class="activeTitleNav bg-gray-200 dark:bg-inherit flex flex-col justify-center items-center">
                <img src="https://imagedelivery.net/fxLkBNfku_NQYTxvBXeEAA/4fb69c4a-20a5-42b0-abb5-9327aa52f000/public" />
                <h1 class="text-black  text-center text-xl dark:text-white" id="titleLong">
                    {{ __('sidebar.main_heading') }}    
                </h1>
                <h1 class="text-black text-center text-xl hidden dark:text-white" id="titleShort">
                    {{ __('sidebar.main_heading_short') }}</h1>
            </div>
            <ul class="overflow-y-hidden hover:overflow-y-auto aside sidebar-scrollbar py-4">
                <li
                    class="flex flex-col justify-end items-center mx-2 menu-title pb-4 border-b border-gray-700/25 gap-2">
                    <x-theme.adjustTheme />
                    <x-localization.lang />
                </li>
                {{-- Start Dashboard --}}
                <li class="{{ request()->routeIs('dashboard.index') ? 'bg-secondary' : '' }} my-1">
                    <a href="{{ route('dashboard.index') }}"
                        class="flex items-center p-2 font-normal text-gray-900 dark:text-white hover:bg-white dark:hover:bg-gray-950 dark:rounded-none">
                        <i class="fa-solid fa-chart-line"></i>
                        <span class="ml-3 menu-title">{{ __('sidebar.dashboard') }}</span>
                    </a>
                </li>
                {{-- End Dashboard --}}
                <x-sidebar.list title="sidebar.user-types" model="user-types" icon="fa-solid fa-user" />
                <x-sidebar.list title="sidebar.user" model="users" icon="fa-solid fa-user" />
                <x-sidebar.list title="sidebar.user" model="blogs" icon="fa-solid fa-blog" />
                <x-sidebar.list title="sidebar.page" model="pages" icon="fa-solid fa-scroll" />        
                <x-sidebar.list title="sidebar.tag" model="tags" icon="fa-solid fa-scroll" />               
            </ul>
        </div>
        <small class="text-xs text-gray-800/50 font-bold ps-2 fixed bottom-4 left-2 menu-title">
            Developed By 
            <a 
                target="_blank"
                class="text-blue-600 underline"
                href="https://bigsoft.tech/">
                BIGSOFT
            </a>
        </small>
    </aside>
</div>
