@extends('layout')
@section('content')
    <h1>
            {!! $post->title !!}
    </h1>
    <article>

        <p>
            <a href="/categories/{{$post->category->id}}">{{$post->category->name}}</a>
        </p>

        {!! $post->body !!}
    </article>

    <a href="/">Back home</a>
@endsection
