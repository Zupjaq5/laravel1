@extends('layout')
@section('content')
    <h1>
            {!! $post->title !!}
    </h1>
    <article>

        <p>
          By <a href="authors/{{$post->author->name}}">{{$post->author->name}}</a>  <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        </p>

        {!! $post->body !!}
    </article>

    <a href="/">Back home</a>
@endsection
