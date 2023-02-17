@extends('layout')
@section('content')
    <h1> <a href="/posts/{{$post->slug}}  ">
            {!! $post->title !!}
        </a></h1>
    <article>



        {!! $post->body !!}
    </article>

    <a href="/">Back home</a>
@endsection
