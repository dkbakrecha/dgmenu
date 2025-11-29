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
<div class="container my-4">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-dark">Find Your Favorite Recipe</h1>
        <p class="lead text-muted">Explore delicious recipes from around the world.</p>
    </div>

    <div class="row">
        <!-- Mobile Filter Toggle Button -->
        <div class="d-lg-none mb-3">
            <button class="btn btn-primary w-100" type="button" data-bs-toggle="offcanvas" data-bs-target="#recipeFilterOffcanvas" aria-controls="recipeFilterOffcanvas">
                <i class="bi bi-funnel-fill me-2"></i> Filter Recipes
            </button>
        </div>

        <!-- Sidebar Filter (Desktop & Mobile Offcanvas) -->
        <div class="col-lg-3 mb-4">
            <div class="offcanvas-lg offcanvas-start" tabindex="-1" id="recipeFilterOffcanvas" aria-labelledby="recipeFilterOffcanvasLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="recipeFilterOffcanvasLabel">Filter Recipes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#recipeFilterOffcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-0">
                    <div class="card shadow-sm border-0 w-100">
                        <div class="card-body">
                            <h5 class="card-title mb-3 d-none d-lg-block">Filter Recipes</h5>
                            <form action="{{ route('recipes.index') }}" method="GET">
                                <div class="mb-3">
                                    <label for="search" class="form-label">Search</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                                        <input type="text" name="search" id="search" placeholder="Search recipes..." value="{{ request('search') }}" class="form-control border-start-0">
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select name="category" id="category" class="form-select" onchange="this.form.submit()">
                                        <option value="">All Categories</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recipes List -->
        <div class="col-lg-9">
            <div class="row">
                @foreach ($recipes as $recipe)
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-all">
                        <div class="position-relative">
                            @if(!empty($recipe->image))
                            <img src="{{ asset('storage/' . $recipe->image) }}" class="card-img-top" alt="{{ $recipe->title }}" style="height: 200px; object-fit: cover;">
                            @else
                            <img src="{{ asset('img/no_recipe_image.png') }}" class="card-img-top" alt="{{ $recipe->title }}" style="height: 200px; object-fit: cover;">
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('recipes.show', $recipe->slug) }}" class="text-decoration-none text-dark stretched-link">{{ $recipe->title }}</a>
                            </h5>
                            @if(isset($recipe->category->name))
                            <p class="card-text text-muted small mb-2">
                                <i class="bi bi-tags-fill text-primary me-1"></i> {{ $recipe->category->name }}
                            </p>
                            @endif
                            <p class="card-text small text-muted">{{ Str::limit($recipe->description, 100) }}</p>
                            
                            <div class="mt-3">
                                <form action="{{ route('recipes.share', $recipe->id) }}" method="POST" class="d-inline position-relative" style="z-index: 2;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-success">
                                        <i class="bi bi-telegram"></i> Share
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
