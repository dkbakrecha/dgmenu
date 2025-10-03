@extends('layouts/app')
@section('content')
<!-- Hero Section -->
<section class="py-5 text-center" style="background: #fff3e5;">
  <div class="container">
    <div class="row align-items-center flex-column-reverse flex-md-row">
      <div class="col-md-6 text-md-start">
        <h1 class="display-5 fw-bold">Real Feedback That Drives Hospitality Growth.</h1>
        <p class="lead mt-3">Collect honest, actionable feedback from guests to improve experiences, increase retention, and boost revenue.</p>
        <div class="d-flex gap-3 mt-4">
          <a href="{{ route('register-user') }}" class="btn btn-primary btn-lg">✅ Try it Free</a>
        </div>
      </div>
      <div class="col-md-6">
            <img src="{{ asset('/img/dg_feedback_home.png') }}" class="img w-100" alt="DGmenu.in QR Based" title="QR Based Digital Menu - Customer giving feedback">
      </div>
    </div>
  </div>
</section>


<!-- How It Works -->
<section id="how" class="py-5 bg-white">
  <div class="container">
    <h2 class="text-center fw-bold mb-5">Get Started in 3 Simple Steps</h2>
    <div class="row text-center">
      <div class="col-md-4">
        <div class="mb-3 fs-1">📋</div>
        <h5>Create Your Free Account</h5>
        <p>Sign up with basic business details in under 2 minutes.</p>
      </div>
      <div class="col-md-4">
        <div class="mb-3 fs-1">🍽</div>
        <h5>Add Your Menu & Services</h5>
        <p>Upload your offerings, customize categories and branding.</p>
      </div>
      <div class="col-md-4">
        <div class="mb-3 fs-1">📱</div>
        <h5>Display QR & Start Collecting</h5>
        <p>Place the QR code at tables or checkout points and get live feedback.</p>
      </div>
    </div>
  </div>
</section>


<!-- Features Section -->
<section id="features" class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center section-title">Turn Every Guest into a Growth Opportunity</h2>
    <div class="row text-center">
      <div class="col-md-4 mb-4">
        <i class="bi bi-lightbulb display-5 text-warning"></i>
        <h5 class="mt-3">Actionable Suggestions</h5>
        <p>Get honest ideas directly from customers to improve.</p>
      </div>
      <div class="col-md-4 mb-4">
        <i class="bi bi-incognito display-5 text-secondary"></i>
        <h5 class="mt-3">Anonymous & Honest</h5>
        <p>Encourage candid feedback with anonymous mode.</p>
      </div>
      <div class="col-md-4 mb-4">
        <i class="bi bi-heart-fill display-5 text-danger"></i>
        <h5 class="mt-3">Likes & Dislikes</h5>
        <p>See what guests love or dislike in real-time.</p>
      </div>
      <div class="col-md-4 mb-4">
        <i class="bi bi-bar-chart-line display-5 text-success"></i>
        <h5 class="mt-3">Smart Analytics</h5>
        <p>Understand trends, satisfaction scores, and NPS.</p>
      </div>
      <div class="col-md-4 mb-4">
        <i class="bi bi-map display-5 text-info"></i>
        <h5 class="mt-3">Product Roadmap</h5>
        <p>Prioritize features based on customer needs.</p>
      </div>
      <div class="col-md-4 mb-4">
        <i class="bi bi-lock-fill display-5 text-dark"></i>
        <h5 class="mt-3">Private Feedback Boards</h5>
        <p>Each business gets a secure, unique feedback panel.</p>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-5 bg-white">
  <div class="container">
    <h2 class="text-center section-title">Real Results</h2>
    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active text-center">
          <blockquote class="blockquote">
            <p class="mb-4">“Our guests feel heard. Our service has never been better.”</p>
            <footer class="blockquote-footer">Hotel Bliss</footer>
          </blockquote>
        </div>
        <div class="carousel-item text-center">
          <blockquote class="blockquote">
            <p class="mb-4">“Instant feedback helped us fix issues faster than ever before.”</p>
            <footer class="blockquote-footer">Café Aroma</footer>
          </blockquote>
        </div>
        <div class="carousel-item text-center">
          <blockquote class="blockquote">
            <p class="mb-4">“Highly recommend DGmenu to any restaurant serious about growth.”</p>
            <footer class="blockquote-footer">Spice Villa</footer>
          </blockquote>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>
</section>

<!-- Pricing Section -->
<section id="pricing" class="py-5 bg-light hide">
  <div class="container text-center">
    <h2 class="section-title">Flexible Plans That Grow With You</h2>
    <p class="mb-4">Start free. Upgrade as you grow. Cancel anytime.</p>
    <a href="{{ route('pricing') }}#" class="btn btn-primary btn-lg">See Pricing Plans</a>
  </div>
</section>

<!-- Final CTA Banner -->
<section class="py-5 text-white text-center" style="background-color: #E4572E;">
  <div class="container">
    <h2 class="fw-bold">Start Your Free Trial Today</h2>
    <p class="mb-4">No credit card required. Cancel anytime.</p>
    <a href="{{ route('register-user') }}" class="btn btn-light btn-lg">➡️ Try DGmenu Free</a>
  </div>
</section>

    
@endsection