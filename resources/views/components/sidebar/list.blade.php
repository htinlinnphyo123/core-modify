@props(['model','title','icon'=>null,'class'=>null])
@php 
    $routeName = $model . '.*';
    $indexRoute = $model . '.index';
    $managePermission = 'manage ' . $model;
@endphp
@if(permissionCheck([$managePermission]))
    <li class="{{ request()->routeIs($routeName) ? 'bg-secondary' : ''}} my-1 {{ $class }}">
        <a href="{{ route($indexRoute) }}"
            class="flex items-center p-2 font-normal text-gray-900 dark:text-white hover:bg-white dark:hover:bg-gray-950 dark:rounded-none">
            <i class="{{ $icon }}"></i>
            <span class="ml-3 menu-title">{{ __($title) }}</span>
        </a>
    </li>
@endif
