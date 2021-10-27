@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('alert-message'))
            <div class="alert alert-{{ session('alert-type') }}">
                {{ session('alert-message') }}
            </div>
        @endif
        <header class="d-flex justify-content-between align-items-center mb-3">
            <h1>My Categories</h1>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-success">New Category</a>
        </header>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Color</th>
                    <th scope="col">N° Post</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>
                            <h5>
                                <span
                                    class="badge badge-{{ $category->color ?? 'light' }}">{{ $category->color ?? 'No Color' }}
                                </span>
                            </h5>
                        </td>
                        <td>@if ($category->posts) {{ count($category->posts) }} @else 0 @endif</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-primary">Go</a>
                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                class="btn btn-warning mx-3">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                class="delete-button">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">There are any category to show</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @section('scripts')
        {{-- Funzione per chiedere la conferma dell'eliminazione --}}
        <script src="{{ asset('js/confirm-delete.js') }}"></script>
    @endsection
@endsection
