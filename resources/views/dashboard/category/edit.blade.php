@extends('dashboard.master')

@section('content')

    @include('dashboard.fragment.error-form')

    <form action="{{ route('category.update', $category->id) }}" method="POST">
        
        @method('PUT')
        
        @include('dashboard.category.form', ["task" => "edit"])
        

        <button type="submit">
            Send
        </button>
    </form>

@endSection