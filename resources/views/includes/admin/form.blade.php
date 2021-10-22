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
    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
</div>
{{-- Content --}}
<div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" id="content" name="content" rows="5">{{ $post->content }}</textarea>
</div>

<button type="sumbit" class="btn btn-success">Save</button>
</form>
