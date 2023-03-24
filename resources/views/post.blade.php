@extends('layout')

@section('content')
    <h1>Single post description</h1>

    <article>
        <h2>
            {{ $post->title }}
        </h2>

        {!! $post->body !!}

        <a href="/">
            Go back
        </a>
    </article>
@endsection
