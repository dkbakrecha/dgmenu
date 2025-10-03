@extends('layouts.app')


<!-- SEO Meta Tags -->
@section('meta')
    <meta name="description" content="{{ Str::limit($recipe->description, 160) }}">
    <meta name="keywords" content="{{ implode(', ', $recipe->tags->pluck('name')->toArray()) }}">
    <meta property="og:title" content="{{ $recipe->title }}">
    <meta property="og:description" content="{{ Str::limit($recipe->description, 160) }}">
    <meta property="og:image" content="{{ asset('storage/' . $recipe->image) }}">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $recipe->title }}">
    <meta name="twitter:description" content="{{ Str::limit($recipe->description, 160) }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $recipe->image) }}">
@endsection

@section('content')
<div class="container mt-5">


    <!-- Recipe Header Section: Title and Image -->
    <div class="mb-5">
        <div class="text-center mb-3">
            <h1 class="display-4">{{ $recipe->title }}</h1>
        </div>
        <div class="mb-3">
            @if($recipe->image)
                <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}" class="img-fluid rounded shadow-lg">
            @endif
        </div>
    </div>

    <!-- Recipe Category -->
    <div class="mb-3">
        <p><strong>Category:</strong> {{ $recipe->category->name }}</p>
    </div>

    <!-- Recipe Description -->
    <div class="mb-4">
        <h3>Description</h3>
        <p>{{ $recipe->description }}</p>
    </div>

    <!-- Ingredients Section -->
    <div class="mb-4">
        <h3>Ingredients</h3>
        <ul class="list-group list-group-flush">
            @foreach(explode(',', $recipe->ingredients) as $ingredient)
                <li class="list-group-item">{{ $ingredient }}</li>
            @endforeach
        </ul>
    </div>

    <!-- Recipe Tags (after Description) -->
    <div class="mb-4">
        <h5>Tags:</h5>
        <p>
            @foreach($recipe->tags as $tag)
                <span class="badge bg-primary me-1">{{ $tag->name }}</span>
            @endforeach
        </p>
    </div>

    <!-- Steps Section -->
    <div class="mb-4">
        <h3>Steps</h3>
        <ol>
            @foreach(explode("\n", $recipe->steps) as $step)
                <li>{{ $step }}</li>
            @endforeach
        </ol>
    </div>

    <!-- Comments Section -->
    <h3>Comments</h3>
    @forelse($recipe->comments as $comment)
        <div class="comment mb-3">
            <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
            <p><small>{{ $comment->created_at->diffForHumans() }}</small></p>
        </div>
    @empty
        <p>No comments yet. Be the first to comment!</p>
    @endforelse

    <!-- Comment Form -->
    @auth
        <form action="{{ route('comments.store', $recipe->id) }}" method="POST" class="mb-4">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" rows="3" placeholder="Write a comment..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Comment</button>
        </form>
    @else
        <p><a href="{{ route('login') }}" class="text-decoration-none">Log in</a> to post a comment.</p>
    @endauth

    <!-- Social Media Share Links -->
    <p><strong>Share this recipe:</strong></p>
    <div class="d-flex justify-content-center gap-3">
        <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="btn btn-outline-primary btn-sm">
            <i class="bi bi-facebook"></i> Facebook
        </a>
        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($recipe->title) }}" target="_blank" class="btn btn-outline-info btn-sm">
            <i class="bi bi-twitter"></i> Twitter
        </a>
        <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(request()->fullUrl()) }}&media={{ asset('storage/' . $recipe->image) }}" target="_blank" class="btn btn-outline-danger btn-sm">
            <i class="bi bi-pinterest"></i> Pinterest
        </a>
    </div>

</div>
@endsection
