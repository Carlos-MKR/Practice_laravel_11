@extends('dashboard.master')

@section('content')

    @include('dashboard.fragment.error-form')

    <form action="{{ route('category.store')}}" method="POST">

        @include('dashboard.category.form')

        <button type="submit">
            Send
        </button>
    </form>
@endsection