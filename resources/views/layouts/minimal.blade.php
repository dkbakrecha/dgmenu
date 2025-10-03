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

    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
<style>
        :root {
            --primary: #42A7E5;
            --secondary: #FF6B53;
            --gradient: linear-gradient(73.08deg, #2C406E 15.14%, #d5bdff 92.25%);
            --primary-hover: #1e90d6;
            --primary-dark: #11547d;
            --rgba-primary-1: rgba(66, 167, 229, 0.1);
            --rgba-primary-2: rgba(66, 167, 229, 0.2);
            --rgba-primary-3: rgba(66, 167, 229, 0.3);
            --rgba-primary-4: rgba(66, 167, 229, 0.4);
            --rgba-primary-5: rgba(66, 167, 229, 0.5);
            --rgba-primary-6: rgba(66, 167, 229, 0.6);
            --rgba-primary-7: rgba(66, 167, 229, 0.7);
            --rgba-primary-8: rgba(66, 167, 229, 0.8);
            --rgba-primary-9: rgba(66, 167, 229, 0.9);
            --font-family-base: Lato, sans-serif;
            --font-family-title: Lato, sans-serif;
            --border-radius-base: 8px;
            --border-color: #E8EFF3;
            --body-color: #7D8FAB;
            --dark: #825200;
            --bg-white: #FFF;
            --box-shadow: 0px 12px 30px 0px rgba(48, 48, 48, 0.14);
            --title: #4f658b;
        }

        .bg-dark {
            background-color: #3E3321 !important;
        }

        .bg-light {
            background-color: #F5F7F8 !important;
        }

        .bg-light2 {
            background: #f8efba;
        }

        .bg-light h1 {
            color: #3E3321;
        }

        nav.navbar {
            border-bottom: 1px solid #124F5C14;
        }

        .navbar-brand img {
            height: 40px;
        }

        p {
            font-size: 21px;
            line-height: 36px;
            color: #495057;
        }

        img.country-map {
            position: absolute;
            z-index: 0;
            height: 400px;
            width: auto;
            left: 10%;
            opacity: 0.15;
        }

        .page-subheading{
            color: #FFF;
        }

        .r1 {
            border-radius: 4px;
        }

        .outline-icon {
            color: #f98052;
            font-size: 40px;
        }

        .mobile-nav {
            background: #F1F1F1;
            position: fixed;
            bottom: 0;
            height: 65px;
            width: 100%;
            display: flex;
            justify-content: space-around;
        }

        .bloc-icon {
          display: flex;
          justify-content: center;
          align-items: center;
        }

        .bloc-icon img, svg {
          width: 30px;
        }

        footer{
                background-color: #3E3321;
                color: #FFFFFFCC;
            }
            footer a.nav-link {
                color: #FFFFFFCC;
            }

            footer a.nav-link:hover, footer a.nav-link:focus {
                color: #f98052;
            }

            .cta-search .form-control {
                font-family: "Open Sans", Sans-serif;
                font-size: 16px;
                background-color: #FFFFFF1A;
                border-radius: 5px 0px 0px 5px;
                color: #FFF;
            }

            .cta-search .form-control::placeholder {
                color: #FFFFFFCC;
                opacity: 1; /* Firefox */
            }

            .cta-search .form-control::-ms-input-placeholder { /* Edge 12 -18 */
                color: #FFFFFFCC;
            }

            .btn-subscribe {
                background-color: #4d4d50;
                color: #f1f1f1;
                font-weight: 600;
                font-size: 16px;
                line-height: 22px;
                letter-spacing: 0.02em;
                text-transform: uppercase;
                align-items: flex-start;
                padding: 19px 40px;
                border: none;
                border-radius: 0px 5px 5px 0px;
                border-radius: 0 5px 5px 0;
                transition: all 0.3s ease-in-out;
                font-family: "Open Sans", Sans-serif;
                font-size: 16px;
                font-weight: 600;
                text-transform: uppercase;
                font-style: normal;
                line-height: 22px;
                color: #000000;
                background-color: #FFFFFF;
                }

                .join-area p {
            font-weight: 400;
            font-size: 0.95rem;
        }

        .welcome-box {
            box-shadow: none;
            padding: 20px;
            background-color: #FFF;
            border-radius: 8px;
            border: 1px solid #E8EFF3;
            margin: 0 0 20px 0;
            color: #000;
            display: block;
            position: relative;
            text-decoration: none;
        }

        .welcome-box h5, .welcome-box .h5 {
            font-size: 16px;
            margin-top: 0;
            margin-bottom: 8px;
            color: var(--primary);
            font-weight: 600;
        }

        .welcome-box p {
            margin-bottom: 0;
            color: #7D8FAB;
            font-weight:400;
        }


        .welcome-box img {
            width: 70px;
            min-width: 70px;
            height: 70px;
        }


         @media screen and (min-width: 600px) {
            .mobile-nav {
                display: none;
            }
            }

        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            .site-logo {
                width: 100px !important;
                height: 100px;
            }

            .site-logo-can {
                width: 60%;
            }

            .btn-bar .btn {
                width: 100%;
                padding: 15px !important;
                margin: 4px 15px;
                font-size: 20px;
            }

            img.country-map{
                left: 0;
            }
        }
    </style>

    <style>
    .banner-wrapper {
        padding: 15px;
        text-align: center;
        background: var(--dark);
    }

  .banner-wrapper .inner-wrapper h1, .banner-wrapper .inner-wrapper .h1, .banner-wrapper .inner-wrapper h2, .banner-wrapper .inner-wrapper .h2, .banner-wrapper .inner-wrapper h3, .banner-wrapper .inner-wrapper .h3, .banner-wrapper .inner-wrapper h4, .banner-wrapper .inner-wrapper .h4, .banner-wrapper .inner-wrapper h5, .banner-wrapper .inner-wrapper .h5, .banner-wrapper .inner-wrapper h6, .banner-wrapper .inner-wrapper .h6 {
    color: #fff; }
  .banner-wrapper .inner-wrapper p {
    font-size: 1rem; }

    .site-logo-menu {
    width: 180px;
}

    </style>

<style>
 
  .form-signin {
    width: 100%;
    max-width: 400px;
    padding: 2rem;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.05);
  }

  .form-signin img {
    display: block;
    margin: 0 auto 1rem;
  }

  .form-signin .form-floating > .form-control {
    border-radius: 0.5rem;
  }

  .form-signin button {
    border-radius: 0.5rem;
  }

  
</style>

@yield('page-meta')
</head>

<body>
    @yield('header')
    
    <section class="vh-100 bg-light d-flex align-items-center remove-center-mobile">
        <div class="container">   
            @include('flash-message')
            @yield('content')
        </div>
    </section>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>

    <script>
    // Automatically close the alert after 10 seconds
    setTimeout(function() {
      $('.alert').alert('close');
    }, 10000); // 10,000 milliseconds = 10 seconds
  </script>
</body>

</html>