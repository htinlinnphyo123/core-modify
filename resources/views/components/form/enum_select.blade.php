@props(['title', 'name','id', 'enumClass', 'selectedValue' => null])
@php
    $enumClass = "\App\Enums\\" . $enumClass;
    $enumCases = $enumClass::cases();
    $selectedValue ??= old($name)
@endphp

<x-form.single_select title="{{ $title }}" :id="$id" name="{{ $name }}">
    @foreach ($enumCases as $status)
        <option value="{{ $status->value }}" 
            @if ($selectedValue === $status->value) selected @endif>
            {{ str_replace('_', ' ', $status->name) }}
        </option>
    @endforeach
</x-form.single_select>
