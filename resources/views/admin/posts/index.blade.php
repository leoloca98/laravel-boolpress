@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('alert-message'))
            <div class="alert alert-{{ session('alert-type') }}">
                {{ session('alert-message') }}
            </div>
        @endif
        <header class="d-flex justify-content-between align-items-center mb-3">
            <h1>My Post</h1>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-success">New Post</a>
        </header>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Categories</th>
                    <th scope="col">Author</th>
                    <th scope="col">Written at</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>
                            @if ($post->category)
                                <span
                                    class="badge badge-pill badge-{{ $post->category->color ?? light }} px-2">{{ $post->category->name }}</span>
                            @else -
                            @endif
                        </td>
                        <td>@if ($post->author) {{ $post->author->name }} @else Anonymous @endif</td>
                        <td>{{ $post->getFormattedDate('created_at') }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Go</a>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning mx-3">Edit</a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                class="delete-button">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">There are any post to show</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <footer class="d-flex justify-content-center">
            {{ $posts->links() }}
        </footer>
        <hr>
        <section id="posts-by-categories" class="mt-5">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-4 mb-5">
                        <header class="d-flex">
                            <h2>{{ $category->name }}</h2>
                            <p class="text-muted">({{ count($category->posts) }})</p>
                        </header>
                        @forelse ($category->posts as $post)
                            <li><a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a></li>
                        @empty No post for this category
                        @endforelse
                    </div>
                @endforeach
            </div>
        </section>




    </div>
    @section('scripts')
        {{-- Funzione per chiedere la conferma dell'eliminazione --}}
        <script src="{{ asset('js/confirm-delete.js') }}"></script>
    @endsection
@endsection
