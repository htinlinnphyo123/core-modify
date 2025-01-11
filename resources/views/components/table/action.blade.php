@props(['id', 'field', 'isRole' => null,'editFalse'=>false])
<td class="px-3 py-0.5 me-2">
    <style>
        .my-svg {
            fill: rgb(95, 85, 85);
            /* Change to desired color */
        }
    </style>
    <div class="flex justify-end items-center ">
        <button id="action_dropdown_btn_{{ $id }}" data-dropdown-toggle="action_{{ $id }}"
            type="button" data-dropdown-placement="left">
            <svg class="my-svg" viewBox="0 0 100 80" width="30" height="30">
                <rect width="90" height="10" rx="10"></rect>
                <rect y="20" width="90" height="10" rx="10"></rect>
                <rect y="40" width="90" height="10" rx="10"></rect>
            </svg>
        </button>

        <!-- Dropdown menu -->
        <div id="action_{{ $id }}"
            class="{{ config('config.dropdown.wrapper') }} border border-gray-200 shadow-2xl">
            <ul class="{{ config('config.dropdown.ul') }} min-w-32" aria-labelledby="action_{{ $id }}">
                <x-table.show route="{{ $field }}.show" :id="$id" />
                @php
                    $editPermission = 'edit ' . $field;
                    $deletePermission = 'delete ' . $field;
                @endphp
                @if (permissionCheck([$editPermission]))
                    <x-table.edit route="{{ $field }}.edit" :id="$id" />
                @endif
                @if (permissionCheck([$deletePermission]))
                    <x-table.delete route="{{ $field }}.destroy" :id="$id" :isRole="$isRole" />
                @endif
                {{ $slot }}
            </ul>
        </div>
    </div>
</td>
