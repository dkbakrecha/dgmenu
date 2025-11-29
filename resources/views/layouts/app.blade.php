<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    
    @if(request()->getHost() == 'localhost')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-636X0548CD"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-636X0548CD');
    </script>
    @endif

    <title>{{ $meta_title ?? env('APP_NAME') }}</title>
    <meta name="description" content="{{ $meta_description ?? 'Discover authentic recipes collected from traditional old books and home kitchens.' }}">
    <meta name="author" content="Dharmendra" />
    

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet" />

    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />

    <style>
        :root {
            --bs-primary: #D48C56; /* Orange/Gold Accent */
            --bs-primary-rgb: 212, 140, 86;
            --bs-secondary: #4A3B32; /* Dark Brown */
            --bs-secondary-rgb: 74, 59, 50;
            --bs-body-bg: #F8F9FA;
        }
        
        .btn-primary {
            --bs-btn-bg: var(--bs-primary);
            --bs-btn-border-color: var(--bs-primary);
            --bs-btn-hover-bg: #c07a48;
            --bs-btn-hover-border-color: #c07a48;
        }

        .btn-outline-primary {
            --bs-btn-color: var(--bs-primary);
            --bs-btn-border-color: var(--bs-primary);
            --bs-btn-hover-bg: var(--bs-primary);
            --bs-btn-hover-border-color: var(--bs-primary);
        }

        .text-primary {
            color: var(--bs-primary) !important;
        }
        
        .bg-primary {
            background-color: var(--bs-primary) !important;
        }

        .bg-dark {
            background-color: var(--bs-secondary) !important;
        }
        
        body {
            font-family: 'Open Sans', sans-serif;
            color: #333;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Lora', serif;
            color: var(--bs-secondary);
        }
    </style>

    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    @yield('meta')
    @yield('page-meta')
</head>

<body>
  <div class="sticky-top">
<!-- Responsive Navbar -->
<nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm ">
  <div class="container">
    <!-- Brand Logo -->
      @if(Auth::check())
      <a href="{{ route('board') }}" class="navbar-brand">
          <img src="{{ asset('img/dglogomenu.png') }}" alt="{{ env('APP_NAME') }}" class="site-logo-menu w-100">
      </a>
    @else
      <a href="{{ route('homepage') }}" class="navbar-brand">
          <img src="{{ asset('img/dglogomenu.png') }}" alt="{{ env('APP_NAME') }}" class="site-logo-menu w-100">
      </a>
    @endif
    
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
            @include('elements.menulinks')
      </ul>
    </div>
    <!-- Offcanvas for mobile -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasMenu">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav ms-auto">
            @include('elements.menulinks')
        </ul>
      </div>
    </div>
  </div>
</nav>

 @if(Auth::check())
    <div class="nav-scroller bg-body shadow-sm" style="overflow-x: auto; white-space: nowrap; -webkit-overflow-scrolling: touch;">
      <div class="container">
      <nav class="nav nav-underline" aria-label="Secondary navigation">
        <a class="nav-link active" aria-current="page" href="{{ route('board') }}">Dashboard</a>
        
        <a class="nav-link" href="{{ route('resturents') }}">Restaurants</a>
        <a class="nav-link" href="{{ route('recipes.index') }}">Recipes</a>
        <a class="nav-link" href="{{ route('blog.index') }}">Blog</a>

        @if(isset(auth()->user()->role) && auth()->user()->role == 1)
            <!-- Super Admin Links -->
            <a class="nav-link" href="{{ route('users.index') }}">Users</a>
            <a class="nav-link" href="{{ route('business_listing.index') }}">Business Listing</a>
            <a class="nav-link" href="{{ route('posts.index') }}">Manage Blogs</a>
            <a class="nav-link" href="{{ route('posts.create') }}">Create Blog</a>
        @endif

        @if(!empty($business->id))
            <a class="nav-link" href="{{ route('business.edit', $business->id) }}">Update Business</a>
        @endif
        <a class="nav-link" href="{{ route('themes') }}">Theme</a>

      </nav>
      </div>

    </div>
    @endif

  </div>


    <!-- Main Content-->
    @yield('content')
    




<!-- Footer -->
<footer class="bg-dark text-white text-center py-4">
  <div class="container">
    <div class="mb-3">
    <ul class="nav flex-column flex-sm-row justify-content-start justify-content-sm-center">
        <li class="nav-item"><a href="{{ route('homepage') }}" class="nav-link text-white px-2">Home</a></li>
        <li class="nav-item"><a href="{{ route('resturents') }}" class="nav-link text-white px-2">Restaurants</a></li>
        <li class="nav-item"><a href="{{ route('blog.index') }}" class="nav-link text-white px-2">Blog</a></li>
        <li class="nav-item"><a class="nav-link text-white px-2" href="#how">How It Works</a></li>
        <li class="nav-item"><a class="nav-link text-white px-2" href="#features">Features</a></li>

        <li class="nav-item"><a href="{{ route('pricing') }}" class="nav-link text-white px-2">Pricing</a></li>
        <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link text-white px-2">Contact Us</a></li>
        <li class="nav-item"><a href="{{ route('terms') }}" class="nav-link text-white px-2">Terms & Conditions</a></li>
        <li class="nav-item"><a href="{{ route('privacy-policy') }}" class="nav-link text-white px-2">Privacy & Policy</a></li>
    </ul>
    </div>
   
    <div class="mb-3">
      <a href="http://instagram.com/dgmenu/#" target="_blank" class="text-white mx-2 fs-5"><i class="bi bi-instagram"></i></a>
      <a href="https://www.facebook.com/restaurantslisting" target="_blank" class="text-white mx-2 fs-5"><i class="bi bi-facebook"></i></a>
    </div>
    <div class="small">© DGmenu 2025 | Made with <span class="material-symbols-outlined text-danger align-middle">favorite</span> for Hotels & Restaurants</div>
  </div>
</footer>



      

    @if (Request::is('contact'))
        <?php /* include('elements.whatsappchat') */ ?>
    @endif


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>

    <!-- Summernote JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    @yield('jscript')
    @stack('scripts')

</body>

</html>