@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="d-flex justify-content-between align-items-center">
            <h1>Create new Post</h1>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back</a>
        </header>

        <main>
            <form action="{{ route('admin.posts.store') }}" method="POST">
                @csrf
                {{-- Title --}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Insert a title" required>
                </div>
                {{-- Content --}}
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5"
                        placeholder="Insert your post content" required></textarea>
                </div>

                <button type="sumbit" class="btn btn-success">Save</button>
            </form>
        </main>
    </div>
@endsection
