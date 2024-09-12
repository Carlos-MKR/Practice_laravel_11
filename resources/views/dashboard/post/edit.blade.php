@extends('dashboard.master')

@section('content')

    @include('dashboard.fragment.error-form')

    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        
        @method('PUT')
        
        @include('dashboard.fragment.form', ["task" => "edit"])
        

        <button type="submit">
            Send
        </button>
    </form>

@endSection