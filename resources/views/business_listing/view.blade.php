@extends('layouts.app')

@section('content')
<style>
    .restaurant-hero {
        position: relative;
        height: 50vh;
        min-height: 400px;
        background-size: cover;
        background-position: center;
        border-radius: 0 0 30px 30px;
        overflow: hidden;
    }
    .restaurant-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.8));
    }
    .restaurant-hero-content {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 40px 20px;
        color: white;
        text-align: center;
    }
    .restaurant-title {
        font-size: clamp(2rem, 5vw, 3.5rem);
        font-weight: 800;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        margin-bottom: 10px;
    }
    .restaurant-meta {
        font-size: 1.2rem;
        opacity: 0.9;
    }
    .content-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 -10px 30px rgba(0,0,0,0.05);
        margin-top: -50px;
        position: relative;
        z-index: 10;
        padding: 40px;
    }
    .action-btn {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        transition: all 0.3s;
    }
    .action-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
</style>

<!-- Hero Section -->
@php
    $bgImage = $businessListing->images->first() ? asset('storage/' . $businessListing->images->first()->image_path) : 'https://via.placeholder.com/1200x600?text=Restaurant+Image';
@endphp
<div class="restaurant-hero" style="background-image: url('{{ $bgImage }}');">
    <div class="restaurant-hero-content animate__animated animate__fadeInUp">
        <h1 class="restaurant-title">{{ $businessListing->business_name }}</h1>
        <div class="restaurant-meta">
            <i class="fas fa-map-marker-alt me-2"></i>{{ $businessListing->location }}
        </div>
    </div>
</div>

<div class="container mb-5 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="content-card">
                
                <!-- Action Buttons -->
                <div class="d-flex justify-content-center gap-3 mb-5">
                    <button class="btn btn-light action-btn text-primary" data-bs-toggle="modal" data-bs-target="#shareModal" title="Share">
                        <i class="fas fa-share-alt"></i>
                    </button>
                    <button class="btn btn-light action-btn text-danger" title="Favorite">
                        <i class="far fa-heart"></i>
                    </button>
                    <a href="https://maps.google.com/?q={{ urlencode($businessListing->location) }}" target="_blank" class="btn btn-light action-btn text-success" title="Directions">
                        <i class="fas fa-directions"></i>
                    </a>
                </div>

                <div class="row g-5">
                    <!-- Description -->
                    <div class="col-md-8">
                        <h3 class="fw-bold mb-4 text-secondary">About Us</h3>
                        <p class="lead text-muted">{{ $businessListing->business_description }}</p>

                        <div class="mt-5">
                            <h3 class="fw-bold mb-4 text-secondary">Reviews</h3>
                            <div class="d-flex align-items-center mb-4">
                                <h1 class="display-4 fw-bold text-warning mb-0 me-3">{{ number_format($businessListing->avg_rating, 1) }}</h1>
                                <div>
                                    <div class="text-warning fs-5">
                                        @for($i=1; $i<=5; $i++)
                                            @if($i <= round($businessListing->avg_rating))
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <small class="text-muted">{{ $businessListing->total_reviews }} Reviews</small>
                                </div>
                            </div>

                            <!-- Review Form -->
                            <div class="card bg-light border-0 rounded-4 p-4 mb-5">
                                <h5 class="fw-bold mb-3">Leave a Review</h5>
                                <form action="{{ route('reviews.store', $businessListing) }}" method="POST">
                                    @csrf
                                    @if (!Auth::check())
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control border-0" name="user_name" placeholder="Your Name" required>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="email" class="form-control border-0" name="email" placeholder="Your Email">
                                            </div>
                                        </div>
                                    @else
                                        <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                                    @endif
                                    
                                    <div class="mb-3">
                                        <label class="form-label text-muted small fw-bold">RATING</label>
                                        <div class="rating-stars">
                                            @for($i=1; $i<=5; $i++)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="rating" id="rating{{$i}}" value="{{$i}}" required>
                                                    <label class="form-check-label" for="rating{{$i}}">{{$i}} <i class="fas fa-star text-warning"></i></label>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <textarea class="form-control border-0" name="comment" rows="3" placeholder="Share your experience..." required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Submit Review</button>
                                </form>
                            </div>

                            <!-- Reviews List -->
                            <div class="reviews-list">
                                @foreach ($businessListing->reviews as $review)
                                    <div class="d-flex gap-3 mb-4 border-bottom pb-4">
                                        <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px; font-weight: bold; font-size: 1.2rem;">
                                            {{ substr($review->user_name, 0, 1) }}
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-1">{{ $review->user_name }}</h6>
                                            <div class="text-warning small mb-2">
                                                @for($i=1; $i<=5; $i++)
                                                    @if($i <= $review->rating)
                                                        <i class="fas fa-star"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                            <p class="mb-0 text-muted">{{ $review->comment }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                            <h5 class="fw-bold mb-3">Contact Info</h5>
                            <ul class="list-unstyled mb-0">
                                @if($businessListing->website)
                                <li class="mb-3 d-flex align-items-center">
                                    <div class="bg-light rounded-circle p-2 me-3 text-primary"><i class="fas fa-globe"></i></div>
                                    <a href="{{ $businessListing->website }}" target="_blank" class="text-decoration-none text-dark text-break">{{ $businessListing->website }}</a>
                                </li>
                                @endif
                                @if($businessListing->facebook_page)
                                <li class="mb-3 d-flex align-items-center">
                                    <div class="bg-light rounded-circle p-2 me-3 text-primary"><i class="fab fa-facebook-f"></i></div>
                                    <a href="{{ $businessListing->facebook_page }}" target="_blank" class="text-decoration-none text-dark">Facebook Page</a>
                                </li>
                                @endif
                                @if($businessListing->instagram_page)
                                <li class="mb-3 d-flex align-items-center">
                                    <div class="bg-light rounded-circle p-2 me-3 text-primary"><i class="fab fa-instagram"></i></div>
                                    <a href="https://instagram.com/{{ $businessListing->instagram_page }}" target="_blank" class="text-decoration-none text-dark">Instagram</a>
                                </li>
                                @endif
                            </ul>
                        </div>

                        <!-- Map Placeholder -->
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1!2d-73.98!3d40.75!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zM40zMCcxMi42Ik4gNzPCsDU5JzE4LjEiVw!5e0!3m2!1sen!2sus!4v1620000000000!5m2!1sen!2sus" 
                                width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Share Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Share this place</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-4 pb-5">
                <div class="d-flex justify-content-center gap-3">
                    <a href="#" class="btn btn-primary rounded-circle" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-info text-white rounded-circle" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="btn btn-success rounded-circle" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;"><i class="fab fa-whatsapp"></i></a>
                    <button class="btn btn-dark rounded-circle" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;" onclick="navigator.clipboard.writeText(window.location.href); alert('Link copied!');"><i class="fas fa-link"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection