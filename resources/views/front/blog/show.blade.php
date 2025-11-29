@extends('layouts.app')

@section('meta')
<meta name="title" content="{{ $blog->title }} - {{ env('APP_NAME') }}">
<meta name="description" content="{{ Str::limit($blog->short_description, 160) }}">
<link rel="canonical" href="{{ route('blog.show', $blog->title_slug) }}" />
@endsection


@section('content')
<style>
    .blog-header-section {
        background: var(--bs-secondary);
        color: white;
        padding: 60px 0;
        text-align: center;
        margin-bottom: 40px;
    }
    
    .blog-header-section h1 {
        font-size: clamp(2rem, 4vw, 3.5rem);
        font-weight: 700;
        color: white;
        margin-bottom: 10px;
    }

    .blog-meta {
        font-size: 1.1rem;
        opacity: 0.9;
    }

    .blog-image {
        margin-bottom: 40px;
        text-align: center;
    }

    .blog-image img {
        max-width: 100%;
        height: auto;
        max-height: 500px;
        object-fit: cover;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .blog-content-card {
        background: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }
</style>

<!-- Header Section -->
<header class="blog-header-section">
    <div class="container">
        <h1>{{ $blog->title }}</h1>
        <div class="blog-meta">
            <span>Posted on {{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }}</span>
            @if($blog->user)
            <span class="mx-2">|</span>
            <span>by {{ $blog->user->name }}</span>
            @endif
        </div>
    </div>
</header>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <!-- Blog Image -->
            @if($blog->cover_image)
            <div class="blog-image">
                <img src="{{ asset('images/'.$blog->cover_image) }}" alt="{{ $blog->title }}">
            </div>
            @endif

            <div class="blog-content-card">
                <article class="mb-5">
                    {!! $blog->content !!}
                </article>

                <div class="d-flex justify-content-between border-top pt-4 mt-4">
                    @if($prev = $blog->previousPost())
                    <a href="{{ route('blog.show', $prev->title_slug) }}" class="btn btn-outline-primary rounded-pill px-4">
                        &larr; Previous
                    </a>
                    @else
                    <div></div>
                    @endif

                    @if($next = $blog->nextPost())
                    <a href="{{ route('blog.show', $next->title_slug) }}" class="btn btn-outline-primary rounded-pill px-4">
                        Next &rarr;
                    </a>
                    @else
                    <div></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
