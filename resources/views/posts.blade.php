@extends('layout')

@section('content')
    <h1>This is my awesome blog</h1>

    @foreach ($posts as $post)
        <article>
            <h2>
                <a href="/posts/{{ $post->id }}">
                    {{ $post->title }}
                </a>
            </h2>

            <a href="#">
                {{ $post->category->name }}
            </a>

            <div>
                {{ $post->piece }}
            </div>
        </article>
    @endforeach
@endsection
