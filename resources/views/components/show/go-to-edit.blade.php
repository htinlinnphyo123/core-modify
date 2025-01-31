@props([
    'model',
    'id'
])
@php
    $viewRoute = "$model.edit"
@endphp
<a href="{{ route($viewRoute,$id) }}" class="{{ config('config.sampleForm.buttonCreate') }} mt-2 bg-theme">
    <button type="button" class="">
        <i class="fa-solid fa-edit me-4"></i>Go To Edit
    </button>
</a>
