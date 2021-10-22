{{-- Se il post esiste già --}}
@if ($post->exists)
    {{-- Allora entriamo nell'EDIT per modificare --}}
    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
        @method('PATCH')
        {{-- Se non esiste ancora --}}
    @else
        {{-- Allora entriamo nel CREATE per crearne uno nuovo --}}
        <form action="{{ route('admin.posts.store', $post->id) }}" method="POST">
@endif
@csrf
{{-- Title --}}
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
        value="{{ old('title', $post->title) }}">
    <div class="invalid-feedback">
        @error('title')
            {{ $message }}
        @enderror
    </div>
</div>
{{-- Content --}}
<div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"
        rows="5">{{ old('content', $post->content) }}</textarea>
    <div class="invalid-feedback">
        @error('title')
            {{ $message }}
        @enderror
    </div>
</div>

<button type="sumbit" class="btn btn-success">Save</button>
</form>
