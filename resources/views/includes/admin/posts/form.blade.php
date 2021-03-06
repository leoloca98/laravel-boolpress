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
{{-- Category --}}
<div class="form-group">
    <label for="category_id">Select Category</label>
    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
        <option value="">No Category</option>
        @foreach ($categories as $category)
            <option @if (old('category_id', $post->category_id) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
{{-- Tags --}} {{-- Occhio alla validazione che ho messo che potrebbe aver rotto tutto --}}
<fieldset class="mb-4">
    <p>Tags</p>
    @foreach ($tags as $tag)
        <div class="form-check form-check-inline">
            <input class="form-check-input  @error('tag_id') is-invalid @enderror" type="checkbox"
                id="tag-{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]" @if (in_array($tag->id, old('tags', $tagIds ?? [])))  checked @endif>
            <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
        </div>
    @endforeach

    @error('tag_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</fieldset>
<button type="sumbit" class="btn btn-success">Save</button>
</form>
