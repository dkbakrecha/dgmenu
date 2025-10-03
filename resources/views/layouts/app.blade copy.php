<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name=description content="--" />
    <meta name="author" content="Dharmendra" />
    
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

    <title>{{ env('APP_NAME') }}</title>
    

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link href="{{ asset('css/common.css') }}" rel="stylesheet" />
    @yield('meta')    
    @yield('page-meta')
</head>

<body>
<nav class="navbar navbar-expand-xl bg-dark">
    <div class="container">
        <!-- Hamburger Menu -->
        <button class="navbar-toggler bg-light me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvas" aria-controls="navbarOffcanvas" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand Logo -->
        <a href="{{ route('homepage') }}" class="navbar-brand">
            <img src="{{ asset('img/dglogomenu.png') }}" alt="{{ env('APP_NAME') }}" class="site-logo-menu">
        </a>


        <!-- Offcanvas Menu (For Navigation Links Only) -->
        <div class="offcanvas offcanvas-start" id="navbarOffcanvas" tabindex="-1" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                    <img src="{{ asset('img/dglogomenu.png') }}" alt="{{ env('APP_NAME') }}" class="site-logo-can">
                </h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <ul class="navbar-nav flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link fs-5 active" aria-current="page" href="{{ route('homepage') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="{{ route('resturents') }}" title="Restaurants">Restaurants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="{{ route('recipes.index') }}" title="Recipes">Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="{{ route('about') }}" title="About us">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="{{ route('pricing') }}" title="Pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="{{ route('contact') }}" title="Contact us">Contact us</a>
                    </li>
                </ul>
            </div>
        </div>



        <!-- Action Buttons for Login & After Login (Visible at All Times) -->
        <div class="d-flex align-items-center ms-auto gap-3">
            @if(Auth::check())
                <!-- Notification Icon (Visible at All Times) -->
                <a class="nav-link position-relative text-light" href="{{ route('notifications') }}" aria-label="Notifications">
                    <span class="material-symbols-outlined fs-4">notifications</span>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
                </a>

                <!-- Profile Dropdown (Visible at All Times) -->
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center text-light" href="#" 
                       id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if(Auth::user()->profile_image)
                            <img src="{{ Auth::user()->profile_image }}" 
                                 alt="Profile Image" 
                                 class="rounded-circle me-2" 
                                 width="35" height="35">
                        @else
                            <div class="profile-circle text-white me-2">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        @endif

                        <div class="d-flex flex-column">
                            <strong>{{ Auth::user()->name }}</strong>
                            <small class="text-muted">{{ Auth::user()->role == 2 ? 'User' : 'Restaurant' }}</small>
                        </div>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.view') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('settings') }}">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item text-danger" href="{{ route('sign-out') }}">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            @else
                <!-- Login Button -->
                <a class="btn btn-warning text-dark d-flex align-items-center gap-2 px-3 py-2" href="{{ route('login') }}">
                    <span class="material-symbols-outlined">login</span> 
                    Login
                </a>

                <!-- Get Started Button -->
                <a class="btn btn-primary text-light d-flex align-items-center gap-2 px-3 py-2" href="{{ route('register-user') }}">
                    <span class="material-symbols-outlined">add_business</span> 
                    Get Started
                </a>
            @endif
        </div>
    </div>
</nav>




    @yield('header')

    @if (!View::hasSection('hide-header'))

    <header class="bg-dark">
        <div class="container px-5">
            <div class="row gx-5">
                <div class="my-5">
                    <h1 class="text-white mb-2 text-center">
                        @yield('page-title', 'Welcome Back')
                    </h1>
                </div>
            </div>
        </div>
    </header>
    @endif
    
    @include('flash-message')



    <!-- Main Content-->
    @yield('content')
    @include('elements.mobilenav')
    <footer class="py-3 bg-dark text-white">
    <div class="container">
        <div class="row justify-content-between">
            
            <div class="col-lg-12">
                <ul class="nav flex-column flex-sm-row justify-content-start justify-content-sm-center">
                    <li class="nav-item"><a href="{{ route('homepage') }}" class="nav-link text-white px-2">Home</a></li>
                    <li class="nav-item"><a href="{{ route('resturents') }}" class="nav-link text-white px-2">Restaurants</a></li>
                    <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link text-white px-2">Contact Us</a></li>
                    <li class="nav-item"><a href="{{ route('terms') }}" class="nav-link text-white px-2">Terms & Conditions</a></li>
                    <li class="nav-item"><a href="{{ route('privacy-policy') }}" class="nav-link text-white px-2">Privacy & Policy</a></li>
                </ul>
            </div>
            
        </div>
        <div class="text-center">
            <div class="col-lg-2 text-lg-end hide">
                <a href="https://www.facebook.com/restaurantslisting" target="_blank" class="text-white me-3">
                    <span class="material-symbols-outlined fs-5">facebook</span>
                </a>
                <a href="https://www.instagram.com/dgmenu" target="_blank" class="text-white">
                    <span class="material-symbols-outlined fs-5">camera</span>
                </a>
            </div>
            <p class="mb-0 text-white">
                Made with <span class="material-symbols-outlined text-danger align-middle">favorite</span> {{ env('APP_NAME') }} {{ date('Y') }}
            </p>
        </div>


    </div>
</footer>


      

    @if (Request::is('contact'))
        <?php /* include('elements.whatsappchat') */ ?>
    @endif


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>

    @yield('jscript')
    @stack('scripts')

</body>

</html>