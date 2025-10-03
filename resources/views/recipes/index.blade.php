@extends('layouts.app')

@section('page-title', 'Find Your Favorite Recipe')

@section('content')
<style>
    /* Custom Styling */
.search-section {
    background-color: #f8f9fa;
    padding: 60px 0;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.search-section h2 {
    font-size: 3rem;
    font-weight: 600;
    color: #333;
}

.search-section .input-group {
    width: 80%;
    max-width: 800px;
    margin-bottom: 15px;
}

.search-section .form-control {
    font-size: 1.25rem;
    border-radius: 50px;
}

.search-section .btn-primary {
    border-radius: 50px;
    font-size: 1.25rem;
    padding: 0.75rem 1.5rem;
    transition: background-color 0.3s;
}

.search-section .btn-primary:hover {
    background-color: #0056b3;
}

/* Recipe Cards Styling */
.recipe-card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin-bottom: 20px;
    transition: transform 0.3s;
}

.recipe-card:hover {
    transform: translateY(-5px);
}

.recipe-image {
    width: 25%;
    height: auto;
    object-fit: cover;
}

.recipe-content {
    padding: 20px;
}

.card-title a {
    font-size: 1.5rem;
    color: #333;
    text-decoration: none;
}

.card-title a:hover {
    text-decoration: underline;
}

.card-category {
    font-size: 1rem;
    color: #6c757d;
}

.card-text {
    font-size: 1.1rem;
    color: #333;
}

</style>
<!-- Search Form Section -->
<div class="search-section text-center mb-5">
    <div class="container">
        <form action="{{ route('recipes.index') }}" method="GET" class="d-flex justify-content-center flex-column align-items-center">
            <!-- Search Input -->
            <div class="input-group mb-3">
                <input type="text" name="search" placeholder="Search recipes..." value="{{ request('search') }}" class="form-control form-control-lg" aria-label="Search recipes">
                <button type="submit" class="btn btn-primary btn-lg ml-2">Search</button>
            </div>
            
            <!-- Category Dropdown -->
            <div class="input-group mb-3">
                <select name="category" class="form-control form-control-lg">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>
</div>

<!-- Recipes List -->
<div class="container my-4">
    <h2 class="text-center my-4">Recipes</h2>

    <!-- Loop through each recipe -->
    @foreach ($recipes as $recipe)
        <div class="recipe-card d-flex mb-3">
            <!-- Recipe Image -->
            <img src="{{ asset('storage/' . $recipe->image) }}" class="recipe-image" alt="{{ $recipe->title }} Image">
            
            <!-- Recipe Content -->
            <div class="recipe-content">
                <!-- Recipe Title with Hyperlink -->
                <h5 class="card-title">
                    <a href="{{ route('recipes.show', $recipe->slug) }}">{{ $recipe->title }}</a>
                </h5>
                <!-- Category Display -->
                <p class="card-category">Category: {{ $recipe->category->name }}</p>
                <!-- Recipe Description -->
                <p class="card-text">{{ Str::limit($recipe->description, 300) }}</p>

                <form action="{{ route('recipes.share', $recipe->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Share to Telegram</button>
            </form>
            </div>
        </div>
    @endforeach
</div>

@endsection
