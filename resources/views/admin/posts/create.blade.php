@extends('layout')
@section('content')
    <x-setting heading="Publish New Post">
        <form method="post" action="/admin/posts"
              enctype="multipart/form-data">  {{--enctype  - jesli chcemy wstawiac pliki --}}
            @csrf
            <x-form.input name="title"/>
            <x-form.input name="slug"/>
            <x-form.input name="thumbnail" type="file"/>
            <x-form.textarea name="excerpt"/>


            <x-form.field>
                <x-form.textarea name="body"/>
                <x-form.error name="body"/>
            </x-form.field>

            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id">
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp

                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                            {{old('category_id') == $category->id ? 'selected' : ''}}
                        >{{ucwords($category->name)}}</option>
                    @endforeach

                </select>

                <x-form.error name="category"/>
            </x-form.field>
            <x-submit-button>
                Publish
            </x-submit-button>
        </form>
    </x-setting>


@endsection
