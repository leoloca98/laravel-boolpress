@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>My Post</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Written at</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td><a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Vai</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">There are any post to show</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
