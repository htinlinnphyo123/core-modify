<x-app-layout>
    <div class="flex bg-gray-50 dark:bg-gray-600">
        <x-sidebar :name="$attributes['name']"></x-sidebar>
        <div class="flex flex-col flex-1 w-full">
            <x-header :headerName="$attributes['headerName']">
            </x-header>
            <x-common.toast />
            <div class="hidden" id="loadingFalse">
                {{ $slot }}
            </div>
            <x-loading.loading-two></x-loading.loading-two>
        </div>
        @vite(['resources/js/common/navShowHide.js'])
    </div>
</x-app-layout>
