@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero-section position-relative text-center text-white d-flex align-items-center justify-content-center" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80'); background-size: cover; background-position: center; height: 70vh; min-height: 500px;">
    <div class="container position-relative z-index-1">
        <h1 class="display-2 fw-bold mb-4 animate__animated animate__fadeInDown">Taste the Authentic</h1>
        <p class="lead mb-5 fs-3 animate__animated animate__fadeInUp animate__delay-1s">Discover & Share Recipes from Around the World</p>
        
        <div class="row justify-content-center animate__animated animate__fadeInUp animate__delay-2s">
            <div class="col-md-8 col-lg-6">
                <form action="{{ route('recipes.index') }}" method="GET" class="d-flex bg-white p-2 rounded-pill shadow-lg search-bar-container">
                    <input type="text" name="search" class="form-control border-0 rounded-pill ps-4 shadow-none fs-5" placeholder="What are you craving today?" aria-label="Search">
                    <button type="submit" class="btn btn-primary rounded-pill px-5 fw-bold fs-5">Search</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold section-title display-5">Explore Categories</h2>
            <p class="text-muted fs-5">Find the perfect dish for any occasion</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            @foreach($categories as $category)
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('recipes.index', ['category' => $category->id]) }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm hover-card text-center overflow-hidden rounded-4">
                        <div class="card-img-top position-relative" style="height: 120px; background-color: #f8f9fa;">
                             <!-- Improved placeholder images -->
                            <img src="https://placehold.co/200x200/e9ecef/495057?text={{ urlencode($category->name) }}" class="w-100 h-100 object-fit-cover" alt="{{ $category->name }}">
                            <div class="overlay position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-25"></div>
                        </div>
                        <div class="card-body py-3">
                            <h6 class="card-title fw-bold mb-0 text-uppercase ls-1">{{ $category->name }}</h6>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Recipes Section -->
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <h2 class="fw-bold section-title display-5">Featured Recipes</h2>
                <p class="text-muted mb-0 fs-5">Hand-picked recipes just for you</p>
            </div>
            <a href="{{ route('recipes.index') }}" class="btn btn-outline-primary rounded-pill px-4 fw-bold">View All</a>
        </div>

        <div class="row g-4">
            @forelse($recipes as $recipe)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-lg hover-card recipe-card rounded-4 overflow-hidden">
                    <div class="position-relative">
                        @if($recipe->image)
                            <img src="{{ asset('storage/' . $recipe->image) }}" class="card-img-top" alt="{{ $recipe->title }}" style="height: 280px; object-fit: cover;">
                        @else
                            <img src="https://placehold.co/400x280/e9ecef/495057?text=No+Image" class="card-img-top" alt="{{ $recipe->title }}" style="height: 280px; object-fit: cover;">
                        @endif
                        <span class="badge bg-white text-dark position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill shadow-sm fw-bold">
                            <i class="bi bi-clock me-1"></i> 30 min
                        </span>
                        <div class="category-badge position-absolute bottom-0 start-0 m-3">
                             <span class="badge bg-primary text-white rounded-pill px-3 py-2 shadow-sm">
                                {{ $recipe->category->name ?? 'Uncategorized' }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                             <div class="text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                                <span class="text-muted small ms-1">(4.5)</span>
                            </div>
                        </div>
                        <h4 class="card-title fw-bold mb-3">
                            <a href="{{ route('recipes.show', $recipe->slug) }}" class="text-decoration-none text-dark stretched-link">
                                {{ $recipe->title }}
                            </a>
                        </h4>
                        <p class="card-text text-muted line-clamp-2">
                            {{ Str::limit($recipe->description, 100) }}
                        </p>
                    </div>
                    <div class="card-footer bg-white border-0 p-4 pt-0">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2 border border-2 border-white shadow-sm" style="width: 40px; height: 40px; font-weight: bold;">
                                    DG
                                </div>
                                <small class="text-dark fw-bold">DG Menu</small>
                            </div>
                            <small class="text-muted"><i class="bi bi-heart-fill text-danger me-1"></i> 124</small>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="mb-3">
                    <i class="bi bi-journal-x display-1 text-muted"></i>
                </div>
                <h4>No featured recipes found.</h4>
                <p class="text-muted">Check back later for delicious updates!</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-primary text-white text-center position-relative overflow-hidden">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('https://www.transparenttextures.com/patterns/food.png'); opacity: 0.1;"></div>
    <div class="container position-relative z-index-1">
        <h2 class="display-4 fw-bold mb-3">Share Your Culinary Masterpieces</h2>
        <p class="lead mb-5">Join our community and share your favorite recipes with the world.</p>
        <a href="{{ route('recipes.create') }}" class="btn btn-light btn-lg rounded-pill px-5 text-primary fw-bold shadow-lg transform-hover">Submit a Recipe</a>
    </div>
</section>

<style>
    .hover-card {
        transition: all 0.3s ease;
    }
    .hover-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 1.5rem 4rem rgba(0,0,0,.15)!important;
    }
    .transform-hover {
        transition: transform 0.2s;
    }
    .transform-hover:hover {
        transform: scale(1.05);
    }
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .section-title {
        position: relative;
        display: inline-block;
        padding-bottom: 15px;
    }
    .section-title::after {
        content: '';
        position: absolute;
        left: 50%;
        bottom: 0;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background-color: var(--bs-primary);
        border-radius: 2px;
    }
    .ls-1 {
        letter-spacing: 1px;
    }
    .object-fit-cover {
        object-fit: cover;
    }
    /* Hero Overlay */
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.65); /* Darker overlay */
        z-index: 0;
    }
    .hero-section h1 {
        text-shadow: 2px 2px 10px rgba(0,0,0,0.8);
    }
</style>
@endsection
