@extends('layouts/miniview')

@section('content')
<header class="">
    <div class="container px-4 px-lg-5">
        <div class="row gx-5">
            <div class="my-3">
            @foreach($businessListing->images as $image)
                            <div class="card w-50 m-auto">
                                <img src="{{ asset('storage/' . $image->image_path) }}" class="card-img-top" alt="Business Image">
                    
                            </div>
                        
                    @endforeach
                <h1 class="mb-2 mt-4 text-center">{{ $businessListing->business_name }}</h1>
            </div>
        </div>
    </div>
</header>


<!-- Main Content-->
<main class="bg-light">
    
        <div class="container py-3 restaurant-address">
            <div class="row">
                <div class="col-md-12">
                    <span>Where to Go!</span>
                    <p>{{ $businessListing->location }}</p>
                    <span class="material-symbols-outlined">pin_drop</span> 
                </div>
            </div>
        </div>
    
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-8">
                    
                    
                
                    {{ $businessListing->business_description }}
        </div>

        <div class="cta-section">
            <div class="cta-icon" data-toggle="modal" data-target="#shareModal">
                <i class="material-icons">share</i>
                <span>Share</span>
            </div>
            <div class="cta-icon">
                <i class="material-icons">favorite</i>
                <span>Favorite</span>
            </div>
            <div class="cta-icon">
                <i class="material-icons">directions</i>
                <span>Directions</span>
            </div>
        </div>

      
<p>Average Rating: {{ $businessListing->avg_rating }}</p>
    <p>Total Reviews: {{ $businessListing->total_reviews }}</p>

    
    <h2>Leave a Review</h2>
    <form action="{{ route('reviews.store', $businessListing) }}" method="POST">
        @csrf
        @if (!Auth::check())
            <div class="form-group">
                <label for="user_name">Name:</label>
                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter your phone number">
            </div>
        @else
            <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
        @endif
        
        <div class="form-group">
                <label for="rating">Rating:</label>
                <div class="rating">
                    <input type="radio" id="star1" name="rating" value="1">
                    <label for="star1">
                        <i class="material-icons">sentiment_very_dissatisfied</i>
                        <span>Bad</span>
                    </label>
                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2">
                        <i class="material-icons">sentiment_dissatisfied</i>
                        <span>Poor</span>
                    </label>
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3">
                        <i class="material-icons">sentiment_neutral</i>
                        <span>Average</span>
                    </label>
                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4">
                        <i class="material-icons">sentiment_satisfied</i>
                        <span>Good</span>
                    </label>
                    <input type="radio" id="star5" name="rating" value="5">
                    <label for="star5">
                        <i class="material-icons">sentiment_very_satisfied</i>
                        <span>Excellent</span>
                    </label>
                </div>
            </div>
        
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Enter your comments"></textarea>
            </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>

    <h2>Reviews</h2>
    <ul>
        @foreach ($businessListing->reviews as $review)
            <li>
                <strong>{{ $review->user_name }}</strong> - 
                {{ $review->rating }}/5 - 
                {{ $review->comment }} - 
                
            </li>
        @endforeach
    </ul>
    <div class="list-group">
  <a href="{{ route('homepage') }}" class="list-group-item list-group-item-action text-center">
  <img src="{{ asset('img/dglogomenu.png') }}" alt="{{ env('APP_NAME') }}" class="m-auto site-logo-menu w-50">
  </a>
  <a href="{{ route('resturents') }}" class="list-group-item list-group-item-action">Restaurants List</a>
  
</div>


<?php /*
        <div class="col-md-12 hide">
                <ul class="list-group list-group-flush theme-contact-info">
                    <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 16 3 C 11.042969 3 7 7.042969 7 12 C 7 13.40625 7.570313 15.019531 8.34375 16.78125 C 9.117188 18.542969 10.113281 20.414063 11.125 22.15625 C 13.148438 25.644531 15.1875 28.5625 15.1875 28.5625 L 16 29.75 L 16.8125 28.5625 C 16.8125 28.5625 18.851563 25.644531 20.875 22.15625 C 21.886719 20.414063 22.882813 18.542969 23.65625 16.78125 C 24.429688 15.019531 25 13.40625 25 12 C 25 7.042969 20.957031 3 16 3 Z M 16 5 C 19.878906 5 23 8.121094 23 12 C 23 12.800781 22.570313 14.316406 21.84375 15.96875 C 21.117188 17.621094 20.113281 19.453125 19.125 21.15625 C 17.554688 23.867188 16.578125 25.300781 16 26.15625 C 15.421875 25.300781 14.445313 23.867188 12.875 21.15625 C 11.886719 19.453125 10.882813 17.621094 10.15625 15.96875 C 9.429688 14.316406 9 12.800781 9 12 C 9 8.121094 12.121094 5 16 5 Z M 16 10 C 14.894531 10 14 10.894531 14 12 C 14 13.105469 14.894531 14 16 14 C 17.105469 14 18 13.105469 18 12 C 18 10.894531 17.105469 10 16 10 Z"></path></svg></span>
                        <p class="theme-contact-info__content">Rajasthan, India</p>
                    </li>
                    <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 22.625 3.03125 C 22.304688 3.0625 21.976563 3.148438 21.65625 3.28125 L 21.65625 3.25 C 21.640625 3.253906 21.609375 3.277344 21.59375 3.28125 C 19.160156 4.136719 14.5 6.28125 10.28125 10.5 C 6.03125 14.75 3.980469 19.496094 3.0625 21.84375 L 3.0625 21.875 C 2.65625 23.089844 2.945313 24.40625 3.75 25.34375 L 3.78125 25.375 L 3.78125 25.40625 L 6.78125 28.375 L 6.90625 28.5 C 7.734375 29.328125 9.171875 29.328125 10 28.5 L 14.09375 24.40625 C 14.921875 23.578125 14.921875 22.109375 14.09375 21.28125 L 12.125 19.3125 C 12.46875 18.597656 13.359375 16.839844 14.9375 15.1875 C 16.503906 13.546875 18.300781 12.710938 19 12.40625 L 21.0625 14.46875 L 21.15625 14.53125 C 21.625 14.84375 22.160156 15.019531 22.71875 15 C 23.242188 14.980469 23.785156 14.722656 24.1875 14.28125 L 24.21875 14.3125 L 24.28125 14.21875 L 28.3125 10.21875 C 29.140625 9.390625 29.140625 7.921875 28.3125 7.09375 L 25.21875 4 C 24.78125 3.5625 24.191406 3.234375 23.5625 3.09375 C 23.257813 3.027344 22.945313 3 22.625 3.03125 Z M 22.78125 5.03125 C 23.160156 5.003906 23.539063 5.164063 23.78125 5.40625 L 26.90625 8.5 C 27.078125 8.671875 27.078125 8.609375 26.90625 8.78125 L 22.71875 12.96875 C 22.722656 12.964844 22.71875 12.996094 22.625 13 C 22.546875 13.003906 22.429688 12.9375 22.3125 12.875 L 22.25 12.875 L 19.90625 10.5 L 19.4375 10.03125 L 18.84375 10.25 C 18.84375 10.25 15.769531 11.398438 13.46875 13.8125 C 11.207031 16.179688 9.96875 19.09375 9.96875 19.09375 L 9.71875 19.71875 L 10.1875 20.21875 L 12.6875 22.71875 C 12.859375 22.890625 12.859375 22.828125 12.6875 23 L 8.59375 27.09375 C 8.421875 27.265625 8.484375 27.265625 8.3125 27.09375 L 5.25 24.0625 C 5.242188 24.054688 5.257813 24.039063 5.25 24.03125 L 5.21875 24 C 4.871094 23.566406 4.765625 23.105469 4.9375 22.5625 C 4.941406 22.550781 4.933594 22.542969 4.9375 22.53125 C 5.824219 20.273438 7.777344 15.847656 11.71875 11.90625 C 15.675781 7.949219 20.164063 5.914063 22.34375 5.15625 L 22.375 5.125 L 22.40625 5.125 C 22.527344 5.070313 22.65625 5.039063 22.78125 5.03125 Z"></path></svg></span>
                        <p class="theme-contact-info__content">+91 81122 92417</p>
                    </li>
                    <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 16 4 C 9.382813 4 4 9.382813 4 16 C 4 22.617188 9.382813 28 16 28 C 22.617188 28 28 22.617188 28 16 C 28 9.382813 22.617188 4 16 4 Z M 16 6 C 17.96875 6 19.796875 6.585938 21.34375 7.5625 L 20.53125 7.65625 L 20.71875 9.65625 L 19.65625 9.1875 L 18.78125 9.9375 L 18.9375 12 L 21.09375 11.3125 L 23.78125 12.1875 L 23.09375 13.4375 L 21.46875 12.4375 L 19.71875 12.6875 L 18 13.96875 L 17.03125 16.96875 L 18.96875 18.5625 C 18.96875 18.5625 20.957031 18.21875 21.0625 18.21875 C 21.167969 18.21875 21.90625 20.03125 21.90625 20.03125 L 20.3125 25.03125 C 19.011719 25.652344 17.542969 26 16 26 C 15.683594 26 15.371094 25.964844 15.0625 25.9375 L 13.96875 24.03125 L 15.03125 20.03125 L 11 17 L 7.28125 17 L 6.3125 15.03125 L 9 12.90625 L 13 11 L 12.40625 8.34375 L 14.125 7.96875 L 14.9375 9.09375 L 17.9375 8.53125 L 17.40625 6.21875 L 15.1875 6.0625 C 15.453125 6.042969 15.726563 6 16 6 Z M 14.875 6.0625 L 13.3125 6.71875 L 12.5625 6.59375 C 13.300781 6.324219 14.066406 6.152344 14.875 6.0625 Z M 6.0625 16.78125 L 7.03125 17.90625 L 7.03125 19.96875 L 8.90625 22.03125 L 10.0625 22.03125 L 12.90625 25.53125 C 9.132813 24.308594 6.378906 20.890625 6.0625 16.78125 Z"></path></svg></span>
                        <a href="https://example.com" class="theme-contact-info__content" target="_blank" rel="nofollow">https://example.com</a>
                    </li>
                    <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 16 3 L 15.46875 3.34375 L 3.46875 11.15625 L 3 11.46875 L 3 29 L 29 29 L 29 11.46875 L 28.53125 11.15625 L 16.53125 3.34375 Z M 16 5.375 L 26.1875 12 L 16 18.59375 L 5.8125 12 Z M 5 13.84375 L 15.46875 20.625 L 16 20.96875 L 16.53125 20.625 L 27 13.84375 L 27 27 L 5 27 Z"></path></svg></span>
                        <a href="mailto:support@example.com" class="theme-contact-info__content" target="_blank" rel="nofollow">support@example.com</a>
                    </li>
                </ul>
            </div>
*/ ?>

    </div>
</div>

    <!-- Share Modal -->
    <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shareModalLabel">Share this page</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="material-icons">facebook</i>
                            <a href="https://facebook.com" target="_blank" class="text-dark">Share on Facebook</a>
                        </li>
                        <li class="list-group-item">
                            <i class="material-icons">instagram</i>
                            <a href="https://instagram.com" target="_blank" class="text-dark">Share on Instagram</a>
                        </li>
                        <li class="list-group-item">
                            <i class="material-icons">telegram</i>
                            <a href="https://telegram.org" target="_blank" class="text-dark">Share on Telegram</a>
                        </li>
                        <li class="list-group-item">
                            <i class="material-icons">whatsapp</i>
                            <a href="https://wa.me" target="_blank" class="text-dark">Share on WhatsApp</a>
                        </li>
                        <li class="list-group-item">
                            <i class="material-icons">link</i>
                            <a href="#" id="copyUrl" class="text-dark">Copy URL</a>
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection