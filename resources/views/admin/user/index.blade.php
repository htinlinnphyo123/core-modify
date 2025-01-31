<x-master-layout name="User" headerName="{{ __('sidebar.user') }}">
    <main class="h-full overflow-y-auto">
        <div class="container px-1 md:px-6 mx-auto grid">
            <div class="container md:flex justify-start md:justify-between items-start mx-auto mt-5">
                <x-common.search keyword="{{ request()->keyword }}" />
                <x-common.create-button route="users.create" permission="create users" />
                <x-common.index-toast field="role_name" />
            </div>
            <x-table.wrapper>
                <x-table.header :fields="['user_name', 'email', 'role', 'status']" />
                <x-table.body :data="$data">
                    @foreach ($data['data'] as $record)
                        <x-table.body-row>
                            <x-table.body-column :field="$record['name']" />
                            <x-table.body-column :field="$record['email']" limit="40" />
                            <x-table.body-column :field="$record['role']" />
                            <x-table.status :status="$record['status']"></x-table.status>
                            <x-table.action :id="$record['id']" field="users" :isRole="$record['role']" />
                        </x-table.body-row>
                    @endforeach
                </x-table.body>
            </x-table.wrapper>
            <x-pagination.index route="users.index" :meta="$data['meta']" />
        </div>
    </main>
    @vite('resources/js/common/deleteConfirm.js')
</x-master-layout>
