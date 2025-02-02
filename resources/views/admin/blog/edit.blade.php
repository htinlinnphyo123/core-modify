<x-master-layout name="Blog" headerName="{{ __('sidebar.blog') }}">
    <x-form.layout>
        <form action="{{ route('blogs.update', $data['id']) }}" method="post">
            @csrf
            @method('PUT')
            <x-form.grid>
                <x-form.input-group title="blog.name" name="name" id="name" :value="$data['name']" :required="true" />
            </x-form.grid>
            <x-form.submit :operate="__('messages.update')" :cancel="__('messages.cancel')" url="blogs.index" />
        </form>
    </x-form.layout>
</x-master-layout>
