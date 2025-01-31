<x-master-layout name="User" headerName="{{ __('sidebar.user') }}">
    <x-form.layout>
        <x-show.go-to-edit model="users" :id="$data['id']" />

        <x-form.grid>
            
            {{-- name --}}
            <x-show.text-group title='user.name' :data="$data['name']"  />
            {{-- name --}}
        </x-form.grid>
          
    </x-form.layout>
</x-master-layout>