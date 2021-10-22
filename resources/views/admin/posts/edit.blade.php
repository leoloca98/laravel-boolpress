@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="d-flex justify-content-between align-items-center">
            <h1>Edit Post</h1>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back</a>
        </header>

        <main>
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PATCH')
                {{-- Title --}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
                </div>
                {{-- Content --}}
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5">{{ $post->content }}</textarea>
                </div>

                <button type="sumbit" class="btn btn-success">Save</button>
            </form>
        </main>
    </div>
@endsection
