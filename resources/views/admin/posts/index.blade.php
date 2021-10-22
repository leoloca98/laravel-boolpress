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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Written at</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
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
    </div>
    @section('scripts')
        {{-- Funzione per chiedere la conferma dell'eliminazione --}}
        <script>
            const deleteButtons = document.querySelectorAll('.delete-button');
            deleteButtons.forEach(btn => {
                btn.addEventListener('submit', function(e) {
                    const conf = confirm('Are you sure you want to delete this post?');
                    if (conf) this.sumbit();
                    else e.preventDefault();
                });
            });
        </script>
    @endsection
@endsection
