@extends('dashboard.master')

@section('content')

    @include('dashboard.fragment.error-form')

    <a href="{{ route('category.create') }}">Create</a>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Options</th>
            </tr>
        </thead>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->title }}</td>
                <td>
                    <a href="{{ route('category.edit', $category->id) }}">Edit</a>
                    <a href="{{ route('category.show', $category->id) }}">Show</a>
                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach     
    </table>

    {{ $categories->links() }}

@endSection