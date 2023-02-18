@extends('layout')
@section('content')
    <h1>
            {!! $post->title !!}
    </h1>
    <article>



        {!! $post->body !!}
    </article>

    <a href="/">Back home</a>
@endsection
