<!-- resources/views/recipes/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create a New Recipe</h2>

    <!-- Display validation errors if any -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Recipe creation form -->
    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Recipe Title -->
        <div class="form-group">
            <label for="title">Recipe Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <!-- Recipe Description -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <!-- Ingredients -->
        <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <textarea name="ingredients" id="ingredients" class="form-control" rows="4" required>{{ old('ingredients') }}</textarea>
            <small class="form-text text-muted">List ingredients, separated by commas.</small>
        </div>

        <!-- Steps -->
        <div class="form-group">
            <label for="steps">Steps</label>
            <textarea name="steps" id="steps" class="form-control" rows="6" required>{{ old('steps') }}</textarea>
            <small class="form-text text-muted">List steps, separated by line breaks.</small>
        </div>

        <!-- Category Dropdown -->
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category_id" id="category" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tags (Checkboxes) -->
        <div class="form-group">
            <label for="tags">Tags</label>
            <div class="form-check">
                @foreach($tags as $tag)
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag_{{ $tag->id }}"
                           {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                    <label for="tag_{{ $tag->id }}" class="form-check-label">{{ $tag->name }}</label><br>
                @endforeach
            </div>
        </div>

        <!-- Image Upload -->
        <div class="form-group">
            <label for="image">Recipe Image</label>
            <input type="file" name="image" id="image" class="form-control-file">
            <small class="form-text text-muted">Supported formats: JPEG, PNG, JPG.</small>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit Recipe</button>
    </form>
</div>
@endsection
