<x-master-layout name="Blog" headerName="{{ __('sidebar.blog') }}">
    <x-form.layout>
        <form action="{{ route('blogs.store') }}" method="post">
            @csrf
            <x-form.grid>
                <x-form.input-group title="blog.name" name="name" id="name" :required="true" />
            </x-form.grid>
            <x-form.submit :operate="__('messages.save')" :cancel="__('messages.cancel')" url="blogs.index" />
        </form>
    </x-form.layout>
</x-master-layout>
