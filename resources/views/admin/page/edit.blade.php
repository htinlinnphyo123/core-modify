<x-master-layout name="Page" headerName="{{ __('sidebar.page') }}">
    <x-form.layout>
        <form action="{{ route('pages.update', $data['id']) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form.grid>
                
                {{-- title --}}
                <x-form.input_group title='page.title' name='title' id='title' :value="$data['title']" />
                {{-- title --}}

                {{-- title_other --}}
                <x-form.input_group title='page.title_other' name='title_other' id='title_other' :value="$data['title_other']" />
                {{-- title_other --}}

                {{-- description --}}
                <x-form.input_group title='page.description' name='description' id='description' :value="$data['description']" />
                {{-- description --}}

                {{-- description_other --}}
                <x-form.input_group title='page.description_other' name='description_other' id='description_other' :value="$data['description_other']" />
                {{-- description_other --}}

                {{-- type --}}
                <x-form.enum_select title='page.type' name='type' id='type' enumClass='Type' :value="$data['type']" />
                {{-- type --}}

                {{-- date --}}
                <x-form.input_group title='page.date' name='date' id='date' :value="$data['date']" />
                {{-- date --}}

                {{-- is_published --}}
                <x-form.input_group title='page.is_published' name='is_published' id='is_published' :value="$data['is_published']" />
                {{-- is_published --}}

                {{-- is_highlighed --}}
                <x-form.input_group title='page.is_highlighed' name='is_highlighed' id='is_highlighed' :value="$data['is_highlighed']" />
                {{-- is_highlighed --}}

                {{-- is_banner --}}
                <x-form.input_group title='page.is_banner' name='is_banner' id='is_banner' :value="$data['is_banner']" />
                {{-- is_banner --}}

                {{-- thumbnail --}}
                <x-form.input_group title='page.thumbnail' name='thumbnail' id='thumbnail' :value="$data['thumbnail']" />
                {{-- thumbnail --}}

                {{-- link --}}
                <x-form.input_group title='page.link' name='link' id='link' :value="$data['link']" />
                {{-- link --}}

                {{-- written_by --}}
                <x-form.input_group title='page.written_by' name='written_by' id='written_by' :value="$data['written_by']" />
                {{-- written_by --}}

            </x-form.grid>
            {{-- Save And Cancel --}}
            <x-form.submit :operate="__('messages.save')" :cancel="__('messages.cancel')" url="pages.index" />
            {{-- Save And Cancel --}}
        </form>
    </x-form.layout>
</x-master-layout>