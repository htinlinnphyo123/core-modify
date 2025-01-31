<x-master-layout name="User" headerName="{{ __('sidebar.user') }}">
    <x-form.layout>
        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-form.grid>

                {{-- name --}}
                <x-form.input-group title='user.name' name='name' id='name' />
                {{-- name --}}

                {{-- name_other --}}
                <x-form.input-group title='user.name_other' name='name_other' id='name-other' />
                {{-- name_other --}}

                {{-- email --}}
                <x-form.input-group title='user.email' name='email' id='email' />
                {{-- email --}}

                {{-- phone --}}
                <x-form.input-group title='user.phone' name='phone' id='phone' />
                {{-- phone --}}

                {{-- password --}}
                <x-form.input-group title='user.password' name='password' id='password' />
                {{-- password --}}

                {{-- id_number --}}
                <x-form.input-group title='user.id_number' name='id_number' id='id-number' />
                {{-- id_number --}}

                {{-- date_of_birth --}}

                <x-form.input-group type="date" title='user.date_of_birth' name='date_of_birth' id='date-of-birth' />
                {{-- date_of_birth --}}

                {{-- father_name --}}
                <x-form.input-group title='user.father_name' name='father_name' id='father-name' />
                {{-- father_name --}}

                {{-- father_name_other --}}
                <x-form.input-group title='user.father_name_other' name='father_name_other' id='father-name-other' />
                {{-- father_name_other --}}

                {{-- gender --}}
                <x-form.enum-select title='user.gender' name='gender' id='gender' enumClass='Gender' />
                {{-- gender --}}

                {{-- martial_status --}}
                <x-form.enum-select title='user.martial_status' name='martial_status' id='martial-status'
                    enumClass='MartialStatus' />
                {{-- martial_status --}}

                <x-form.compose-single-select title='user.role' name='role_id' id='role-id' :dataArray="$viewRoles" />

                {{-- education_status --}}
                <x-form.input-group title='user.education_status' name='education_status' id='education-status' />
                {{-- education_status --}}

                {{-- occupation --}}
                <x-form.input-group title='user.occupation' name='occupation' id='occupation'>
                </x-form.input-group>
                {{-- occupation --}}

                {{-- Status --}}
                <x-form.select-group title="user.status" name="status">
                    @foreach (config('config.status') as $key=>$value)
                    <option value="{{ $key }}">
                        {{ $value }}
                    </option>
                    @endforeach
                </x-form.select-group>
                {{-- Status --}}

            </x-form.grid>
            {{-- Save And Cancel --}}
            <x-form.submit :operate="__('messages.save')" :cancel="__('messages.cancel')" url="users.index" />
            {{-- Save And Cancel --}}
        </form>
    </x-form.layout>
</x-master-layout>
