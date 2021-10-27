{{-- Se il post esiste già --}}
@if ($category->exists)
    {{-- Allora entriamo nell'EDIT per modificare --}}
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @method('PATCH')
        {{-- Se non esiste ancora --}}
    @else
        {{-- Allora entriamo nel CREATE per crearne uno nuovo --}}
        <form action="{{ route('admin.categories.store', $category->id) }}" method="POST">
@endif
@csrf
{{-- Title --}}
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name', $category->name) }}">
    <div class="invalid-feedback">
        @error('name')
            {{ $message }}
        @enderror
    </div>
</div>

{{-- Category --}}
<div class="form-group">
    <label for="color">Select Color</label>
    <select class="form-control @error('color') is-invalid @enderror" id="color" name="color">
        <option>No Color</option>
        <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="success">Green</option>
        <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="danger">Red</option>
        <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="primary">Blue</option>
        <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="warning">Yellow</option>
        <option @if (old('color', $category->color) && old('color', $category->color) == $category->color) selected @endif value="secondary">Grey</option>
    </select>
    @error('color')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<button type="sumbit" class="btn btn-success">Save</button>
</form>
