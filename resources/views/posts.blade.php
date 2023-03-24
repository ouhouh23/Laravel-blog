@extends('layout')

@section('content')
    <h1>This is my awesome blog</h1>

    @foreach ($posts as $post)
        <article>
            <h2>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h2>
            {{ $post->piece }}
        </article>
    @endforeach
@endsection
