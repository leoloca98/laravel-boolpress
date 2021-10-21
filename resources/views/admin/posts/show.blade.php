@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <address>{{ $post->getFormattedDate('created_at') }}</address>
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
