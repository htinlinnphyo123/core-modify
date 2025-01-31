<x-master-layout name="User" headerName="{{ __('sidebar.user') }}">
    <x-form.layout>
        <form action="{{ route('users.update', $data['id']) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form.grid>
                
                {{-- name --}}
                <x-form.input-group title='user.name' name='name' id='name' :value="$data['name']" />
                {{-- name --}}

                {{-- name_other --}}
                <x-form.input-group title='user.name_other' name='name_other' id='name_other' :value="$data['name_other']" />
                {{-- name_other --}}

                {{-- email --}}
                <x-form.input-group title='user.email' name='email' id='email' :value="$data['email']" />
                {{-- email --}}

                {{-- phone --}}
                <x-form.input-group title='user.phone' name='phone' id='phone' :value="$data['phone']" />
                {{-- phone --}}

                {{-- password --}}
                <x-form.input-group title='user.password' name='password' id='password' :value="$data['password']" />
                {{-- password --}}

                {{-- id_number --}}
                <x-form.input-group title='user.id_number' name='id_number' id='id_number' :value="$data['id_number']" />
                {{-- id_number --}}

                {{-- date_of_birth --}}
                <x-form.input-group title='user.date_of_birth' name='date_of_birth' id='date_of_birth' :value="$data['date_of_birth']" />
                {{-- date_of_birth --}}

                {{-- father_name --}}
                <x-form.input-group title='user.father_name' name='father_name' id='father_name' :value="$data['father_name']" />
                {{-- father_name --}}

                {{-- father_name_other --}}
                <x-form.input-group title='user.father_name_other' name='father_name_other' id='father_name_other' :value="$data['father_name_other']" />
                {{-- father_name_other --}}

                {{-- gender --}}
                <x-form.enum-select title='user.gender' name='gender' id='gender' enumClass='Gender' :value="$data['gender']" />
                {{-- gender --}}

                {{-- martial_status --}}
                <x-form.enum-select title='user.martial_status' name='martial_status' id='martial_status' enumClass='MartialStatus' :value="$data['martial_status']" />
                {{-- martial_status --}}

                {{-- education_status --}}
                <x-form.input-group title='user.education_status' name='education_status' id='education_status' :value="$data['education_status']" />
                {{-- education_status --}}

                {{-- occupation --}}
                <x-form.input-group title='user.occupation' name='occupation' id='occupation' :value="$data['occupation']" />
                {{-- occupation --}}

                {{-- profile_photo --}}
                <x-form.input-group title='user.profile_photo' name='profile_photo' id='profile_photo' :value="$data['profile_photo']" />
                {{-- profile_photo --}}

                {{-- country_id --}}
                <x-form.input-group title='user.country_id' name='country_id' id='country_id' :value="$data['country_id']" />
                {{-- country_id --}}

                {{-- oauth_id --}}
                <x-form.input-group title='user.oauth_id' name='oauth_id' id='oauth_id' :value="$data['oauth_id']" />
                {{-- oauth_id --}}

                {{-- oauth_provider --}}
                <x-form.input-group title='user.oauth_provider' name='oauth_provider' id='oauth_provider' :value="$data['oauth_provider']" />
                {{-- oauth_provider --}}

                {{-- level --}}
                <x-form.input-group title='user.level' name='level' id='level' :value="$data['level']" />
                {{-- level --}}

                {{-- status --}}
                <x-form.input-group title='user.status' name='status' id='status' :value="$data['status']" />
                {{-- status --}}

            </x-form.grid>
            {{-- Save And Cancel --}}
            <x-form.submit :operate="__('messages.save')" :cancel="__('messages.cancel')" url="users.index" />
            {{-- Save And Cancel --}}
        </form>
    </x-form.layout>
</x-master-layout>