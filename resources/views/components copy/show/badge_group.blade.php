
@props(['title','data'])
<x-show.control>
    <x-show.label :title="$title" />
    @foreach ($data as $item)
        <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-white dark:text-dark">
            {{ $item }}
        </span>
    @endforeach
</x-show.control>