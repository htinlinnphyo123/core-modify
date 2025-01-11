@props(['title', 'name', 'id','dataArray','hasSearch'=>false, 'selectedValue' => null])
@php
    $selectedValue ??= old($name)
@endphp
<x-form.single_select :title="$title" :name="$name" :id="$id" :hasSearch="$hasSearch">
    @foreach ($dataArray as $key=>$value)
        <option value="{{ $key }}"
            @if ($selectedValue == $key) selected @endif>
            {{ $value }} 
        </option>
    @endforeach
</x-form.single_select>