@extends('layout')

@section('content')
    {{--
    @foreach ($posts as $post)
        <article class="{{$loop->even? 'foobar': ''}}">

            <h1>

                <a href="/posts/<?= $post->slug; ?>">
                    {!! $post->title !!}
                </a>
            </h1>
            <p>
                By <a href="authors/{{$post->author->name}}">{{$post->author->name}}</a>  <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
            </p>

            <div>
                {{ $post->excerpt }}

            </div>
        </article>

    @endforeach
    --}}

    @include('_post-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if($posts->count())


            @if($posts->count()>1)
            <x-posts-grid :posts="$posts" />
           @endif
        @else
            <p class="text-center">Not posts yet. Please check back later.</p>


            {{--
                   <div class="lg:grid lg:grid-cols-3">
                       <x-post-card/>
                       <x-post-card/>
                       <x-post-card/>


                   </div>

                   --}}
        @endif
    </main>
@endsection

