@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>Category: @if ($post->category){{ $post->category->name }} @else No Category @endif</p>
        <p>{{ $post->content }}</p>
        <address>{{ $post->getFormattedDate('created_at') }}</address>
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="delete-button">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger  mx-3">Delete</button>
            </form>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@section('scripts')
    {{-- Funzione per chiedere la conferma dell'eliminazione --}}
    <script src="{{ asset('js/confirm-delete.js') }}"></script>
@endsection
@endsection
