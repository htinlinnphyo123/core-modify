<x-master-layout name="Page" headerName="{{ __('sidebar.page') }}">
    <main class="h-full overflow-y-auto">
        <div class="container px-1 md:px-6 mx-auto grid">
            <div class="container md:flex justify-start md:justify-between items-start mx-auto mt-5">
                <x-common.search keyword="{{ request()->keyword }}" />
                <x-common.create-button route="pages.create" permission="create pages" />
            </div>
            <x-table.wrapper>
                <x-table.header :fields="['name']" />
                <x-table.body :data="$data">
                    @foreach ($data['data'] as $record)
                        <x-table.body-row>
                            <x-table.body-column :field="$record['title']" />
                            <x-table.action :id="$record['id']" field="pages" />
                        </x-table.body-row>
                    @endforeach
                </x-table.body>
            </x-table.wrapper>
            <x-pagination.index route="pages.index" :meta="$data['meta']" />
        </div>
    </main>
    @vite('resources/js/common/deleteConfirm.js')
</x-master-layout>
