@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <ul>
                        <li>
                            {{ $error }}
                        </li>
                    </ul>
                @endforeach
            </div>
        @endif
        <header class="d-flex justify-content-between align-items-center">
            <h1>Edit Post</h1>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back</a>
        </header>

        <main>
            @include('includes.admin.form') {{-- //! Attenzione all'indirizzo --}}
        </main>
    </div>
@endsection
