@props(['title', 'name','id', 'enumClass', 'selectedValue' => null])
@php
    $enumClass = "\App\Enums\\" . $enumClass;
    $enumCases = $enumClass::cases();
    $selectedValue ??= old($name)
@endphp

<x-form.single-select title="{{ $title }}" :id="$id" name="{{ $name }}">
    @foreach ($enumCases as $status)
        <option value="{{ $status->name }}" 
            @if ($selectedValue === $status->name) selected @endif>
            {{ str_replace('_', ' ', $status->value) }}
        </option>
    @endforeach
</x-form.single-select>
