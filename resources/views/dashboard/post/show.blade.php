@extends('dashboard.master')

@section('content')

    <h1>Title: {{ $post->title }}</h1>

    <p>Slug: {{ $post->slug }}</p>

    <p>Category: {{ $post->category->title }}</p>

    <p>Description: {{ $post->description }}</p>

    <p>Posted: {{ $post->posted }}</p>

    @if ($post->image)
        <img src="{{ asset('uploads/posts/' . $post->image) }}" alt="{{ $post->title }}" width="200">
    @endif

@endsection
