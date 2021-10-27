@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $category->name }}</h1>
        <p>Color: {{ $category->color }}</p>
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="delete-button">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger  mx-3">Delete</button>
            </form>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@section('scripts')
    {{-- Funzione per chiedere la conferma dell'eliminazione --}}
    <script src="{{ asset('js/confirm-delete.js') }}"></script>
@endsection
@endsection
