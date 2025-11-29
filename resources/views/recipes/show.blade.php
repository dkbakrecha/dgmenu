@extends('layouts.app')

@php
    $postUrl = request()->fullUrl();
    $postTitle = $recipe->title;
    $postImage = asset('storage/' . $recipe->image);
    $postDesc = Str::limit($recipe->description, 160);
@endphp

@section('meta')
    <meta name="description" content="{{ Str::limit($recipe->description, 160) }}">
    <meta property="og:title" content="{{ $recipe->title }}">
    <meta property="og:description" content="{{ Str::limit($recipe->description, 160) }}">
    <meta property="og:image" content="{{ asset('storage/' . $recipe->image) }}">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta name="twitter:card" content="summary_large_image">
@endsection

@section('content')
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>
    /* Print Styles */
    @media print {
        header, footer, .share-bar, .comments-section, .btn, .breadcrumb, .navbar {
            display: none !important;
        }
        body {
            background: white !important;
            color: black !important;
        }
        .container {
            width: 100% !important;
            max-width: 100% !important;
            padding: 0 !important;
        }
        .recipe-header-section {
            background: none !important;
            color: black !important;
            text-align: left !important;
            padding: 0 !important;
            margin-bottom: 20px !important;
        }
        .recipe-header-section h1 {
            color: black !important;
            font-size: 24pt !important;
        }
        .recipe-image img {
            max-height: 300px !important;
        }
    }

    /* Screen Styles */
    .recipe-header-section {
        background: var(--bs-secondary);
        color: white;
        padding: 60px 0;
        text-align: center;
        margin-bottom: 40px;
    }
    
    .recipe-header-section h1 {
        font-size: clamp(2rem, 4vw, 3.5rem);
        font-weight: 700;
        color: white;
        margin-bottom: 10px;
    }

    .recipe-meta {
        font-size: 1.1rem;
        opacity: 0.9;
    }

    .recipe-image {
        margin-bottom: 40px;
        text-align: center;
    }

    .recipe-image img {
        max-width: 100%;
        height: auto;
        max-height: 500px;
        object-fit: cover;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .recipe-content-card {
        background: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }

    .ingredient-item {
        padding: 10px 0;
        border-bottom: 1px solid #eee;
        display: flex;
        align-items: flex-start;
    }
    
    .ingredient-item:last-child {
        border-bottom: none;
    }

    .step-item {
        margin-bottom: 25px;
    }
    
    .step-number {
        display: inline-block;
        width: 30px;
        height: 30px;
        background: var(--bs-primary);
        color: white;
        text-align: center;
        line-height: 30px;
        border-radius: 50%;
        margin-right: 10px;
        font-weight: bold;
    }

    .share-bar {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background: white;
        padding: 10px 20px;
        border-radius: 50px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        z-index: 100;
        display: flex;
        gap: 15px;
    }
    .share-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        transition: transform 0.2s;
    }
    .share-icon:hover {
        transform: translateY(-3px);
    }
</style>

<!-- Header Section -->
<header class="recipe-header-section">
    <div class="container">
        <h1>{{ $recipe->title }}</h1>
        <div class="recipe-meta">
            <span class="me-3"><i class="fas fa-utensils me-2"></i>{{ $recipe->category->name }}</span>
            <span class="me-3"><i class="far fa-clock me-2"></i>30 Mins</span>
            <span><i class="fas fa-fire me-2"></i>Easy</span>
        </div>
    </div>
</header>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <!-- Recipe Image -->
            @if($recipe->image)
            <div class="recipe-image">
                <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}">
            </div>
            @endif

            <div class="recipe-content-card">
                <!-- Description -->
                <div class="mb-5">
                    <h3 class="fw-bold mb-3 text-secondary">Description</h3>
                    <p class="lead text-muted">{{ $recipe->description }}</p>
                    <div class="mt-3">
                        @foreach($recipe->tags as $tag)
                            <span class="badge bg-light text-dark border me-1">#{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="row g-5">
                    <!-- Ingredients -->
                    <div class="col-md-5">
                        <h3 class="fw-bold mb-4 text-primary"><i class="fas fa-shopping-basket me-2"></i>Ingredients</h3>
                        <div class="bg-light rounded-4 p-4">
                            @foreach(preg_split('/\r\n|\r|\n/', $recipe->ingredients) as $ingredient)
                                @if(trim($ingredient) !== '')
                                    <div class="ingredient-item">
                                        <i class="fas fa-check-circle text-primary me-2 mt-1"></i>
                                        <span>{{ $ingredient }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Steps -->
                    <div class="col-md-7">
                        <h3 class="fw-bold mb-4" style="color: var(--bs-primary);"><i class="fas fa-list-ol me-2"></i>Instructions</h3>
                        <div class="steps-container">
                            @foreach(explode("\n", $recipe->steps) as $index => $step)
                                @if(trim($step) !== '')
                                <div class="step-item">
                                    <div class="step-number">{{ $index + 1 }}</div>
                                    <div class="step-content">
                                        <h5>Step {{ $index + 1 }}</h5>
                                        <p class="text-muted fs-5">{{ $step }}</p>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Comments Section -->
                <div class="mt-5 pt-5 border-top">
                    <h3 class="fw-bold mb-4">Comments ({{ $recipe->comments->count() }})</h3>
                    
                    @auth
                        <form action="{{ route('comments.store', $recipe->id) }}" method="POST" class="mb-5">
                            @csrf
                            <div class="d-flex gap-3">
                                <div class="avatar bg-light rounded-circle d-flex align-items-center justify-content-center border flex-shrink-0" style="width: 50px; height: 50px;">
                                    <i class="fas fa-user text-muted"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <textarea name="content" class="form-control bg-light border-0 rounded-4 p-3" rows="3" placeholder="Share your thoughts..." required></textarea>
                                    <button type="submit" class="btn btn-primary rounded-pill px-4 mt-3 fw-bold">Post Comment</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-light text-center rounded-4">
                            <a href="{{ route('login') }}" class="fw-bold text-primary text-decoration-none">Log in</a> to join the conversation.
                        </div>
                    @endauth

                    <div class="comments-list">
                        @forelse($recipe->comments as $comment)
                            <div class="d-flex gap-3 mb-4">
                                <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 45px; height: 45px; font-weight: bold;">
                                    {{ substr($comment->user->name, 0, 1) }}
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $comment->user->name }} <small class="text-muted fw-normal ms-2">{{ $comment->created_at->diffForHumans() }}</small></h6>
                                    <p class="mb-0 text-muted">{{ $comment->content }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-muted">No comments yet. Be the first to share your thoughts!</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Floating Share Bar -->
<div class="share-bar animate__animated animate__fadeInUp">
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($postUrl) }}" target="_blank" class="share-icon" style="background: #1877f2;"><i class="fab fa-facebook-f"></i></a>
    <a href="https://twitter.com/intent/tweet?url={{ urlencode($postUrl) }}&text={{ urlencode($postTitle) }}" target="_blank" class="share-icon" style="background: #1da1f2;"><i class="fab fa-twitter"></i></a>
    <a href="https://api.whatsapp.com/send?text={{ urlencode($postTitle . ' ' . $postUrl) }}" target="_blank" class="share-icon" style="background: #25d366;"><i class="fab fa-whatsapp"></i></a>
    <button onclick="navigator.clipboard.writeText('{{ $postUrl }}'); alert('Link copied!');" class="share-icon border-0" style="background: #333;"><i class="fas fa-link"></i></button>
</div>

@endsection
