@extends('layouts.app')

@php
    $postUrl = request()->fullUrl();
    $postTitle = $recipe->title;
    $postImage = asset('storage/' . $recipe->image);
    $postDesc = Str::limit($recipe->description, 160);
@endphp

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
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>
/* Full width title header */
.recipe-title-header {
    width: 100%;
    background: linear-gradient(135deg, #ffb347, #ffcc33); /* warm gradient */
    padding: 2.5rem 0;
    margin-bottom: 2rem;
    text-align: center;
    color: #fff;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}

.recipe-title-header h1 {
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 700;
    margin: 0;
    line-height: 1.2;
}


    /* Recipe Header Section */
.recipe-header {
    margin-bottom: 3rem;
    text-align: center;
}

/* Title */
.recipe-header h1 {
    font-size: clamp(2rem, 5vw, 3rem); /* responsive title */
    font-weight: 700;
    margin-bottom: 1rem;
    color: #333;
    line-height: 1.2;
}

/* Image */
.recipe-header img {
    display: block;
    max-width: 100%;
    height: auto;
    max-height: 450px;  /* controls image height */
    object-fit: cover;  /* keeps aspect ratio but crops excess */
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    margin: 0 auto;
}

/* Category and Description */
.recipe-meta {
    font-size: 1rem;
    margin-bottom: 1.5rem;
    color: #555;
}

.recipe-description {
    font-size: 1.1rem;
    line-height: 1.6;
    color: #444;
}
.recipe-description h3 {
    font-weight: 600;
    margin-bottom: 0.75rem;
    font-size: 1.5rem;
}


    .share-section {
      border-top: 1px solid #eee;
      padding: 20px 0;
      margin-top: 20px;
    }
    .share-section h6 {
      font-weight: 600;
      margin-right: 15px;
      color: #555;
    }
    .share-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 42px;
      height: 42px;
      margin: 0 5px;
      border-radius: 12px;
      color: #fff;
      font-size: 18px;
      transition: all 0.3s ease;
    }
    .share-btn:hover {
      transform: translateY(-3px) scale(1.05);
      box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    }

    /* Brand colors */
    .btn-fb { background: #1877f2; }
    .btn-tw { background: #1da1f2; }
    .btn-li { background: #0a66c2; }
    .btn-pin { background: #e60023; }
    .btn-wa { background: #25d366; }
    .btn-tg { background: #0088cc; }
    .btn-mail { background: #ff6f00; }
    .btn-link { background: #333; }

    @media (max-width: 768px) {
      .desktop-only { display: none !important; }
    }
    @media (min-width: 769px) {
      .mobile-only { display: none !important; }
    }





/* Ingredients
------------------------------------- */
.ingredients {
	background-color: #fff;
	border: 1px solid #e9e9e9;
	padding: 39px 0;
	position: relative;
	margin: 12px 0 35px 0;
}

.ingredients li {
    list-style: none;
	border-bottom: 1px solid #e9e9e9;
	height: auto;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	padding: 10px 0 4px 0;
	padding-left: 120px;
}

.ingredients li:first-child {border-top: 1px solid #e9e9e9;}

.ingredients:before,
.ingredients:after {
	content:"";
	height: 100%;
	width: 1px;
	background-color: #ffd4d4;
	position: absolute;
	top: 0;
}

.ingredients:before { left: 70px; }
.ingredients:after { left: 74px; }
.ingredients li {padding-left: 120px;}



.ingredients label:before {
	content: "";
	display: inline-block;
	width: 19px;
	height: 19px;
	margin-right: 10px;
	position: absolute;
	left: 0;
	top: -1px;
	background-color: #fff;
	border: 2px solid #d0d0d0;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}



/* Directions
------------------------------------- */
ol.steps {
	list-style-type: none;
	list-style-type: decimal !ie; /*IE 7- hack*/
	margin: 15px 0 0 34px;
	padding: 0;
	counter-reset: li-counter;
}

ol.steps > li {
	position: relative;
	margin-bottom: 15px;
	padding: 8px 14px;
	line-height: 24px;
}

ol.steps > li:last-child { margin-bottom: 35px; }

ol.steps > li:before {
	position: absolute;
	top: 3px;
	left: -34px;
	width: 34px;
	height: 34px;
	text-align: center;
	line-height: 32px;
	color: #999;
	font-weight: 700;
	font-size: 16px;
	background-color: #f4f4f4;
	content: counter(li-counter);
	counter-increment: li-counter;
	cursor: default;
}

  </style>

<!-- Full Width Recipe Title Header -->
<div class="recipe-title-header">
    <div class="container">
        <h1>{{ $recipe->title }}</h1>
    </div>
</div>

<div class="container mt-5">

    <!-- Recipe Image -->
    <div class="recipe-header mb-5">
        @if($recipe->image)
            <img src="{{ asset('storage/' . $recipe->image) }}" 
                 alt="{{ $recipe->title }}">
        @endif
    </div>


    
    <!-- Recipe Category -->
    <div class="recipe-meta mb-3">
        <p><strong>Category:</strong> {{ $recipe->category->name }}</p>
    </div>

    <!-- Recipe Description -->
    <div class="recipe-description mb-4">
        <h3>Description</h3>
        <p>{{ $recipe->description }}</p>
    </div>


   <!-- Ingredients Section -->
    <div class="mb-4">
        <h3>Ingredients</h3>
        <ul class="ingredients">
            @foreach(preg_split('/\r\n|\r|\n/', $recipe->ingredients) as $ingredient)
                @if(trim($ingredient) !== '')
                    <li class="">{{ $ingredient }}</li>
                @endif
            @endforeach
        </ul>
    </div>


    <!-- Steps Section -->
    <div class="mb-4">
        <h3>Steps</h3>
        <ol class="steps">
            @foreach(explode("\n", $recipe->steps) as $step)
                <li>{{ $step }}</li>
            @endforeach
        </ol>
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

    <div class="share-section d-flex align-items-center">
    <h6 class="mb-0">Share this recipe:</h6>

    <!-- Facebook -->
    <a class="share-btn btn-fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($postUrl); ?>" target="_blank" title="Share on Facebook">
      <i class="fab fa-facebook-f"></i>
    </a>

    <!-- Twitter -->
    <a class="share-btn btn-tw" href="https://twitter.com/intent/tweet?url=<?php echo urlencode($postUrl); ?>&text=<?php echo urlencode($postTitle); ?>" target="_blank" title="Share on Twitter">
      <i class="fab fa-x-twitter"></i>
    </a>

    <!-- LinkedIn -->
    <a class="share-btn btn-li" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode($postUrl); ?>" target="_blank" title="Share on LinkedIn">
      <i class="fab fa-linkedin-in"></i>
    </a>

    <!-- Pinterest -->
    <a class="share-btn btn-pin desktop-only" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode($postUrl); ?>&media=<?php echo urlencode($postImage); ?>&description=<?php echo urlencode($postDesc); ?>" target="_blank" title="Share on Pinterest">
      <i class="fab fa-pinterest-p"></i>
    </a>

    <!-- WhatsApp (Mobile only) -->
    <a class="share-btn btn-wa mobile-only" href="https://api.whatsapp.com/send?text=<?php echo urlencode($postTitle . ' ' . $postUrl); ?>" target="_blank" title="Share on WhatsApp">
      <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Telegram (Mobile only) -->
    <a class="share-btn btn-tg mobile-only" href="https://t.me/share/url?url=<?php echo urlencode($postUrl); ?>&text=<?php echo urlencode($postTitle); ?>" target="_blank" title="Share on Telegram">
      <i class="fab fa-telegram-plane"></i>
    </a>

    <!-- Email -->
    <a class="share-btn btn-mail" href="mailto:?subject=<?php echo urlencode($postTitle); ?>&body=<?php echo urlencode($postUrl); ?>" title="Share via Email">
      <i class="fas fa-envelope"></i>
    </a>

    <!-- Copy Link -->
    <button class="share-btn btn-link" onclick="copyLink()" title="Copy link">
      <i class="fas fa-link"></i>
    </button>
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

</div>
@endsection
