<x-master-layout name="Dashboard" headerName="{{ __('sidebar.dashboard') }}" class="">

    <main class="h-full overflow-y-auto">
        <div class="">
    
            <div class="bg-white rounded-lg shadow dark:bg-gray-800 p-2 md:p-4 border border-gray-200/50 mx-0.5 sm:mx-2 lg:mx-8 mt-4 lg:mt-10">
                <div class="dark:text-white flex justify-between items-center px-2 text-sm">
                    <p>Last Online Users</p>
                    <a href="{{ route('users.index') }}">See All Users</a>
                </div>
                <x-table.wrapper>
                    <x-table.header :fields="['user_name','ip_address','user_agent','last_activity']" />
                    <x-table.body :data="$onlineUsers">
                        @foreach ($onlineUsers['data'] as $user)
                            <x-table.body_row>
                                <x-table.body_column :field="$user->name" />
                                <x-table.body_column :field="$user->ip_address" />
                                <x-table.body_column :field="$user->user_agent" />
                                <x-table.body_column :field="$user->last_activity" />
                            </x-table.body_row>
                        @endforeach
                    </x-table.body>
                </x-table.wrapper>
            </div>
        </div>
    </main>
    @vite('resources/js/dashboard/chart.js')
</x-master-layout>
