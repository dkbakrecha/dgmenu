@extends('layouts.app')

@section('meta')
<meta name="title" content="Blog - {{ env('APP_NAME') }}">
<meta name="description" content="Read our latest blogs and updates.">
@endsection

@section('content')
<div class="bg-dark py-5 text-center text-white mb-5">
    <div class="container">
        <h1 class="display-4 fw-bold">Our Blog</h1>
        <p class="lead text-white-50">Latest news, updates, and stories</p>
    </div>
</div>

<div class="container py-4">

    <div class="row">
        @forelse($blogs as $blog)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0">
                @if($blog->cover_image)
                <img src="{{ asset('images/'.$blog->cover_image) }}" class="card-img-top" alt="{{ $blog->title }}" style="height: 200px; object-fit: cover;">
                @else
                <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center text-white" style="height: 200px;">
                    <span class="material-symbols-outlined" style="font-size: 48px;">article</span>
                </div>
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">
                        <a href="{{ route('blog.show', $blog->title_slug) }}" class="text-decoration-none text-dark">
                            {{ $blog->title }}
                        </a>
                    </h5>
                    <p class="card-text text-muted small mb-2">
                        <i class="far fa-calendar-alt me-1"></i> {{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }}
                    </p>
                    <p class="card-text flex-grow-1">
                        {{ Str::limit($blog->short_description, 100) }}
                    </p>
                    <a href="{{ route('blog.show', $blog->title_slug) }}" class="btn btn-outline-primary mt-auto">Read More</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="alert alert-info">
                No blog posts found.
            </div>
        </div>
        @endforelse
    </div>

    <div class="row mt-4">
        <div class="col-12 d-flex justify-content-center">
            {{ $blogs->links() }}
        </div>
    </div>
</div>
@endsection
