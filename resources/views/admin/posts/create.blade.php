@extends('layouts.app')

@section('content')
    <div class="container">
        @include('includes.admin.errors-alert')
        <header class="d-flex justify-content-between align-items-center">
            <h1>Create new Post</h1>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back</a>
        </header>

        <main>
            @include('includes.admin.form') {{-- //! Attenzione all'indirizzo --}}
        </main>
    </div>
@endsection
