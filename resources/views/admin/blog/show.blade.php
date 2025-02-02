<x-master-layout name="Blog" headerName="{{ __('sidebar.blog') }}">
    <x-form.layout>
        <x-common.url-back-button />
        <br><br>
        <x-show.grid :isBackground='true'>
            <x-show.text-group title="blog.id" :data="$data['id']" />
            <x-show.text-group title="blog.name" :data="$data['name']" />
        </x-show.grid>
    </x-form.layout>
</x-master-layout>
