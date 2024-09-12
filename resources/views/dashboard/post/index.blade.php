@extends('dashboard.master')

@section('content')

    @include('dashboard.fragment.error-form')

    <a href="{{ route('post.create') }}">Create</a>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Category</th>
                <th>Description</th>
                <th>Posted</th>
                {{-- <th>Image</th> --}}
                <th>Options</th>
            </tr>
        </thead>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->category->title }}</td>
                <td>{{ $post->description }}</td>
                <td>{{ $post->posted }}</td>
                {{-- <td>{{ $post->image }}</td> --}}
                <td>
                    <a href="{{ route('post.edit', $post->id) }}">Edit</a>
                    <a href="{{ route('post.show', $post->id) }}">Show</a>
                    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach     
    </table>

    {{ $posts->links() }}

@endSection