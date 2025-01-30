@props(['fields'])
<thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
    @foreach($fields as $field)
        <x-table.header-column column="table.{{$field}}" />
    @endforeach
    <x-table.header-column column="table.action" style="text-end"/>
</thead>