<x-master-layout name="Page" headerName="{{ __('sidebar.page') }}">
    <x-form.layout>
        <form action="{{ route('pages.update', $id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form.grid>
                
                {{-- title --}}
                <x-form.input-group title='page.title' name='title' id='title' :value="$data['title']" />
                {{-- title --}}

                {{-- description --}}
                <x-form.input-group title='page.description' name='description' id='description' :value="$data['description']" />
                {{-- description --}}

                {{-- type --}}
                <x-form.enum-select title='page.type' name='type' id='type' enumClass='Type' :value="$data['type']" />
                {{-- type --}}

                {{-- date --}}
                <x-form.input-group title='page.date' name='date' id='date' :value="$data['date']" />
                {{-- date --}}

                {{-- is_published --}}
                <x-form.input-group title='page.is_published' name='is_published' id='is_published' :value="$data['is_published']" />
                {{-- is_published --}}

                {{-- thumbnail --}}
                <x-form.input-group title='page.thumbnail' name='thumbnail' id='thumbnail' :value="$data['thumbnail']" />
                {{-- thumbnail --}}

                {{-- link --}}
                <x-form.input-group title='page.link' name='link' id='link' :value="$data['link']" />
                {{-- link --}}

                {{-- written_by --}}
                <x-form.input-group title='page.written_by' name='written_by' id='written_by' :value="$data['written_by']" />
                {{-- written_by --}}

            </x-form.grid>
            {{-- Save And Cancel --}}
            <x-form.submit :operate="__('messages.save')" :cancel="__('messages.cancel')" url="pages.index" />
            {{-- Save And Cancel --}}
        </form>
    </x-form.layout>
</x-master-layout>