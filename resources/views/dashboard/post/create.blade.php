@extends('dashboard.master')

@section('content')

    @include('dashboard.fragment.error-form')

    <form action="{{ route('post.store')}}" method="POST">

        @include('dashboard.fragment.form')

        <button type="submit">
            Send
        </button>
    </form>
@endsection