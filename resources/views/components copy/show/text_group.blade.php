@props(['title', 'data'])
<x-show.control>
    <div class="grid grid-cols-12 gap-4 items-center">
        <div class="col-span-4 flex justify-end">
            <x-show.label :title="$title" />
        </div>
        <div class="col-span-1">
            <div class="text-center"> : </div>
        </div>
        <div class="col-span-7 flex justify-start">
            <x-show.text :data="$data" />
        </div>
    </div>
</x-show.control>
